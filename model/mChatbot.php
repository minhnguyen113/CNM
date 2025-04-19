<?php
include_once(__DIR__ . "/Connect.php");

class ChatbotModel extends ketnoi
{
    // Mapping từ khóa thông minh → ID_ThucDon
    private $mapping = [
        1 => ['miền bắc', 'bắc', 'hà nội', 'bún chả', 'phở hà nội'],
        2 => ['miền trung', 'trung', 'huế', 'món cay', 'đậm đà'],
        3 => ['miền nam', 'nam bộ', 'sài gòn', 'cơm tấm', 'gỏi cuốn'],
        4 => ['đường phố', 'bánh mì', 'snack', 'ăn vặt', 'món nhanh'],
        5 => ['vùng cao', 'tây bắc', 'trứng bắc thảo', 'đặc sản núi rừng'],
        6 => ['ăn chay', 'món chay', 'rau củ', 'thuần chay'],
        7 => ['hải sản', 'mực', 'tôm', 'seafood', 'biển'],
        8 => ['phở', 'bún', 'hủ tiếu', 'nước lèo', 'món nước'],
        9 => ['món nướng', 'nướng', 'xào', 'mì xào', 'grill'],
        10 => ['món chiên', 'chiên', 'trứng chiên', 'giòn', 'lá lốt']
    ];
    
      // ✅ Xử lý câu hỏi người dùng
public function xuLyCauHoi($cauHoi)
{
    $cauHoi = strtolower(trim($cauHoi));
    $idThucDon = $this->tachTuKhoa($cauHoi);

    if ($idThucDon !== null) {
        return [
            'type' => 'result',
            'data' => $this->timMonAn($idThucDon)
        ];
    }

    if (preg_match('/\b(xin chào|chào|hello|hi|hey|có ai không)\b/u', $cauHoi)) {
        return [
            'type' => 'greeting',
            'message' => 'Dạ em chào anh/chị! Mình đang cần tìm món theo vùng nào ạ? Ví dụ: miền bắc, món nướng...'
        ];
    }

    if (preg_match('/\b(món|ăn|gợi ý|giới thiệu|đặc sản)\b/u', $cauHoi)) {
        return [
            'type' => 'suggestion',
            'data' => $this->layMonAnGoiY()
        ];
    }

    return [
        'type' => 'unknown',
        'message' => 'Mình chưa hiểu rõ câu hỏi của anh/chị ạ, mình có thể hỏi về món ăn hoặc vùng miền cụ thể nhé!',
        'data' => []
    ];
}


    // ✅ Tách từ khóa từ câu hỏi người dùng → ID_ThucDon
    public function tachTuKhoa($cauHoi)
    {
        $cauHoi = strtolower($cauHoi);

        foreach ($this->mapping as $idThucDon => $variants) {
            foreach ($variants as $variant) {
                if (strpos($cauHoi, $variant) !== false) {
                    return $idThucDon;
                }
            }
        }

        return null; // Nếu không tìm thấy thì trả về null
    }

    // ✅ Tìm món ăn theo ID_ThucDon
    public function timMonAn($idThucDon)
    {
        // Nếu không có ID thì trả về rỗng luôn
        if (!$idThucDon) {
            return [];
        }

        $db = new ketnoi();
        $conn = $db->Moketnoi();

        // Chuẩn bị câu SQL tìm kiếm theo ID_ThucDon
        $sql = "
            SELECT ma.ID_MonAn, ma.TenMon, ma.Gia, td.TenThucDon
            FROM monan ma
            LEFT JOIN thucdon td ON ma.ID_ThucDon = td.ID_ThucDon
            WHERE ma.ID_ThucDon = '$idThucDon'
        ";

        $result = mysqli_query($conn, $sql);

        $monAn = [];

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $monAn[] = [
                    'id' => $row['ID_MonAn'],
                    'tenMon' => $row['TenMon'],
                    'gia' => number_format($row['Gia'], 0, ',', '.') . ' VND',
                    'thucDon' => $row['TenThucDon']
                ];
            }
        }

        $db->Dongketnoi($conn);

        return $monAn;
    }

    // ✅ Lấy món ăn gợi ý nếu không tìm thấy theo từ khóa
    public function layMonAnGoiY()
    {
        $db = new ketnoi();
        $conn = $db->Moketnoi();

        $sql = "
            SELECT ma.ID_MonAn, ma.TenMon, ma.Gia, td.TenThucDon
            FROM monan ma
            LEFT JOIN thucdon td ON ma.ID_ThucDon = td.ID_ThucDon
            ORDER BY RAND() -- Gợi ý ngẫu nhiên cho đa dạng hơn
            LIMIT 5
        ";

        $result = mysqli_query($conn, $sql);

        $monAn = [];

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $monAn[] = [
                    'id' => $row['ID_MonAn'],
                    'tenMon' => $row['TenMon'],
                    'gia' => number_format($row['Gia'], 0, ',', '.') . ' VND',
                    'thucDon' => $row['TenThucDon']
                ];
            }
        }

        $db->Dongketnoi($conn);

        return $monAn;
    }
}