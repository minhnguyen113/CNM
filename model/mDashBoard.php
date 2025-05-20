<?php
include_once "Connect.php";

class mDashboard
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new ketnoi())->Moketnoi();
    }

    // 1. Đặt bàn thành công mỗi tháng
    public function getDatBanPerMonth()
    {
        $sql = "SELECT MONTH(ThoiGianDat) AS thang, COUNT(*) AS so_luot
                FROM DatBan
                GROUP BY thang";
        $result = mysqli_query($this->conn, $sql);
        $data = array_fill(1, 12, 0);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[(int)$row['thang']] = (int)$row['so_luot'];
        }
        return array_values($data);
    }

    // 2. Doanh thu mỗi tháng (đơn đã hoàn thành)
    public function getDoanhThuPerMonth()
    {
        $sql = "SELECT MONTH(ThoiGianDat) AS thang, SUM(TongTien) AS tong
                FROM DonHang
                WHERE TrangThai = 'Đã hoàn thành'
                GROUP BY thang";
        $result = mysqli_query($this->conn, $sql);
        $data = array_fill(1, 12, 0);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[(int)$row['thang']] = (float)$row['tong'];
        }
        return array_values($data);
    }

    // 3. Số lượng món ăn bán được mỗi tháng
    public function getMonAnBanPerMonth()
    {
        $sql = "SELECT MONTH(D.ThoiGianDat) AS thang, SUM(C.SoLuongMon) AS so_mon
                FROM ChiTietDonHang C
                JOIN DonHang D ON C.ID_DonHang = D.ID_DonHang
                WHERE D.TrangThai = 'Đã hoàn thành'
                GROUP BY thang";
        $result = mysqli_query($this->conn, $sql);
        $data = array_fill(1, 12, 0);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[(int)$row['thang']] = (int)$row['so_mon'];
        }
        return array_values($data);
    }

    // 4. Top 5 món ăn bán chạy
    public function getTop5MonAnBanChay()
    {
        $sql = "SELECT M.TenMon, SUM(C.SoLuongMon) AS so_luong
                FROM ChiTietDonHang C
                JOIN MonAn M ON C.ID_MonAn = M.ID_MonAn
                GROUP BY M.TenMon
                ORDER BY so_luong DESC
                LIMIT 5";
        $result = mysqli_query($this->conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = [
                'ten_mon' => $row['TenMon'],
                'so_luong' => (int)$row['so_luong']
            ];
        }
        return $data;
    }
    public function getTongQuanDashboard()
    {
        // 1. Đặt bàn
        $sql1 = "SELECT MONTH(ThoiGianDat) AS thang, COUNT(*) AS dat_ban
             FROM DatBan
             GROUP BY thang";
        $result1 = mysqli_query($this->conn, $sql1);
        $datBan = array_fill(1, 12, 0);
        while ($row = mysqli_fetch_assoc($result1)) {
            $datBan[(int)$row['thang']] = (int)$row['dat_ban'];
        }

        // 2. Doanh thu
        $sql2 = "SELECT MONTH(ThoiGianDat) AS thang, SUM(TongTien) AS doanh_thu
             FROM DonHang
             WHERE TrangThai = 'Đã hoàn thành'
             GROUP BY thang";
        $result2 = mysqli_query($this->conn, $sql2);
        $doanhThu = array_fill(1, 12, 0);
        while ($row = mysqli_fetch_assoc($result2)) {
            $doanhThu[(int)$row['thang']] = (float)$row['doanh_thu'];
        }

        // 3. Món ăn bán
        $sql3 = "SELECT MONTH(D.ThoiGianDat) AS thang, SUM(C.SoLuongMon) AS so_mon
             FROM ChiTietDonHang C
             JOIN DonHang D ON C.ID_DonHang = D.ID_DonHang
             WHERE D.TrangThai = 'Đã hoàn thành'
             GROUP BY thang";
        $result3 = mysqli_query($this->conn, $sql3);
        $soMon = array_fill(1, 12, 0);
        while ($row = mysqli_fetch_assoc($result3)) {
            $soMon[(int)$row['thang']] = (int)$row['so_mon'];
        }

        // Trả về mảng dữ liệu đồng bộ theo tháng
        return [
            'dat_ban' => array_values($datBan),
            'doanh_thu' => array_values($doanhThu),
            'so_mon' => array_values($soMon)
        ];
    }

    // 6. Top 5 thực đơn bán chạy nhất
    public function getTop5ThucDonBanChay()
    {
        $sql = "SELECT T.TenThucDon, SUM(C.SoLuongMon) AS tong_so_luong
            FROM ChiTietDonHang C
            JOIN MonAn M ON C.ID_MonAn = M.ID_MonAn
            JOIN ThucDon T ON M.ID_ThucDon = T.ID_ThucDon
            GROUP BY T.TenThucDon
            ORDER BY tong_so_luong DESC
            LIMIT 5";

        $result = mysqli_query($this->conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = [
                'ten_thuc_don' => $row['TenThucDon'],
                'so_luong' => (int)$row['tong_so_luong']
            ];
        }
        return $data;
    }


    public function __destruct()
    {
        (new ketnoi())->Dongketnoi($this->conn);
    }
}
