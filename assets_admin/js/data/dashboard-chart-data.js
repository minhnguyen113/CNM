(function ($) {
    "use strict";

    // 📥 Hàm fetch API chung
    async function fetchChartData(url) {
        try {
            const res = await fetch(url);
            return await res.json();
        } catch (err) {
            console.error("❌ API ERROR:", url, err);
            return null;
        }
    }

    // 📊 Mini Chart (dành cho mảng 12 phần tử theo tháng)
    async function renderMiniChart(id, url, type = 'line', color = "#485568", unit = '') {
        const data = await fetchChartData(url);
        console.log(`📊 Data for ${id}:`, data);

        if (!Array.isArray(data) || data.some(val => typeof val !== 'number')) {
            console.warn(`⚠️ Không có dữ liệu hợp lệ cho ${id}`);
            return;
        }
        updateMiniCardText(id.replace('#chart-', ''), data, unit);
        const baseOptions = {
            chart: {
                type,
                height: 50,
                sparkline: { enabled: true },
                dropShadow: {
                    enabled: true, top: 5, left: 5, blur: 3,
                    color: '#000', opacity: 0.1
                }
            },
            series: [{ data }],
            colors: [color],
            stroke: { curve: "smooth", width: 2 },
            xaxis: {
                categories: Array.from({ length: 12 }, (_, i) => `T${i + 1}`),
                labels: { show: false },
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: { labels: { show: false } },
            dataLabels: { enabled: false },
            tooltip: { enabled: false }
        };

        // 👉 Nếu là biểu đồ cột thì thêm plotOptions
        if (type === 'bar') {
            baseOptions.plotOptions = {
                bar: {
                    columnWidth: 25,
                    borderRadius: 0
                }
            };
        }

        const el = document.querySelector(id);
        if (el) new ApexCharts(el, baseOptions).render();
    }

    function updateMiniCardText(idPrefix, data, unit = '') {
        const currentMonth = new Date().getMonth();
        const current = data[currentMonth] || 0;
        const prev = data[currentMonth - 1] || 0;

        // ✅ Tính % thay đổi
        let percent = 0;
        if (prev === 0) {
            percent = current === 0 ? 0 : 100;
        } else {
            percent = ((current - prev) / Math.abs(prev)) * 100;
        }

        // ✅ Lấy DOM
        const totalEl = document.querySelector(`#${idPrefix}-total`);
        const growthEl = document.querySelector(`#${idPrefix}-growth`);
        const arrowEl = growthEl?.previousElementSibling;

        // ✅ Format tổng
        let formattedValue = '';
        if (unit === 'đ') {
            formattedValue = current.toLocaleString('vi-VN') + ' đ';
        } else {
            formattedValue = unit ? `${current} ${unit}` : current.toString();
        }

        // ✅ Gán nội dung
        if (totalEl) totalEl.textContent = formattedValue;
        if (growthEl) growthEl.textContent = `${percent >= 0 ? '+' : ''}${percent.toFixed(1)}%`;

        // ✅ Đổi icon và màu tăng/giảm
        if (arrowEl) {
            arrowEl.className = percent >= 0 ? 'ri-arrow-up-line' : 'ri-arrow-down-line';
            const parent = growthEl.closest('.text-muted');
            if (parent) {
                parent.classList.remove('up', 'down');
                parent.classList.add(percent >= 0 ? 'up' : 'down');
            }
        }
    }


    // 🍢 Mini Chart riêng cho Top Món (mảng object)
    async function renderTopMonMiniChart() {
        const data = await fetchChartData('../../api/dashboard-api.php?action=topmon');
        console.log("🍢 Top món:", data);

        if (!Array.isArray(data)) return;

        // 🌟 Tính tổng số lượt bán và món bán chạy nhất
        const totalTop = data.reduce((sum, item) => sum + (item.so_luong || 0), 0);
        const topMon = data[0]?.ten_mon || '...';
        const topThisMonth = data[0]?.so_luong || 0;
        const topLastMonth = data[1]?.so_luong || 0;
        const percent = topLastMonth === 0 ? 0 : ((topThisMonth - topLastMonth) / Math.abs(topLastMonth)) * 100;

        // 📤 Cập nhật giao diện
        const availableEl = document.querySelector("#rooms-available");
        const topNameEl = document.querySelector("#rooms-topname");
        const growthEl = document.querySelector("#rooms-growth");
        const totalEl = document.querySelector("#rooms-total");

        if (availableEl) availableEl.textContent = totalTop;
        if (topNameEl) topNameEl.textContent = topMon;
        if (growthEl) growthEl.textContent = `${percent >= 0 ? '+' : ''}${percent.toFixed(1)}%`;
        if (totalEl) totalEl.textContent = 'tháng';

        // 📊 Vẽ biểu đồ mini
        const options = {
            chart: {
                type: 'bar',
                height: 50,
                sparkline: { enabled: true },
                dropShadow: {
                    enabled: true, top: 5, left: 5, blur: 3,
                    color: '#000', opacity: 0.1
                }
            },
            series: [{
                data: data.map(item => item.so_luong)
            }],
            colors: ['#485568'],
            xaxis: {
                categories: data.map(item => item.ten_mon),
                labels: { show: false },
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: { labels: { show: false } },
            dataLabels: { enabled: false },
            tooltip: { enabled: false },
            plotOptions: {
                bar: { columnWidth: 25, borderRadius: 2 }
            }
        };

        const el = document.querySelector("#chart-rooms");
        if (el) new ApexCharts(el, options).render();
    }


    // 📈 Biểu đồ tổng quan (Đặt bàn - Doanh thu - Món ăn)
    async function renderOverviewChart() {
        const data = await fetchChartData('../../api/dashboard-api.php?action=tongquan');
        console.log("📈 Overview:", data);

        if (!data || !data.dat_ban || !data.doanh_thu || !data.so_mon) return;

        const options = {
            series: [
                { name: 'Đặt bàn', type: 'area', data: data.dat_ban },
                { name: 'Doanh thu', type: 'line', data: data.doanh_thu },
                { name: 'Món ăn', type: 'line', data: data.so_mon }
            ],
            chart: {
                type: 'line',
                height: 350,
                stacked: false,
                toolbar: { show: false },
                dropShadow: {
                    enabled: true, top: 5, left: 5, blur: 3,
                    color: '#000', opacity: 0.1
                }
            },
            stroke: { width: [2, 2, 2], curve: 'smooth' },
            fill: { opacity: [.5, 1, 1] },
            colors: ['#485568', '#87909e', '#7ea0fb'],
            xaxis: {
                categories: Array.from({ length: 12 }, (_, i) => `T${i + 1}`),
                axisTicks: { show: false },
                axisBorder: { show: false }
            },
            legend: {
                show: true,
                horizontalAlign: "center",
                offsetY: -5
            },
            tooltip: { shared: true }
        };

        const el = document.querySelector("#chart-overview");
        if (el) new ApexCharts(el, options).render();
    }

    // 📊 Top 5 thực đơn bán chạy nhất
    async function renderTopMenuChart() {
        const data = await fetchChartData('../../api/dashboard-api.php?action=topthucdon');
        console.log("🍽️ Top thực đơn:", data);

        if (!Array.isArray(data)) return;

        const options = {
            series: [{
                name: 'Số lượng',
                data: data.map(item => item.so_luong)
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    columnWidth: '45%',
                    distributed: true
                }
            },
            xaxis: {
                categories: data.map(item => item.ten_thuc_don),
                labels: {
                    style: { fontSize: '12px' }
                }
            },
            tooltip: {
                y: {
                    formatter: val => `${val} món`
                }
            }
        };

        const el = document.querySelector("#chart-top-menus");
        if (el) new ApexCharts(el, options).render();
    }

    // 🚀 Load all on page ready
    jQuery(window).on('load', function () {
        renderMiniChart("#chart-visitor", '../../api/dashboard-api.php?action=monan', 'bar', '#485568', 'món');
        renderMiniChart("#chart-bookings", '../../api/dashboard-api.php?action=datban', 'line', '#71757b', 'lượt');
        renderMiniChart("#chart-revenue", '../../api/dashboard-api.php?action=doanhthu', 'bar', '#DC2626', 'đ');
        renderTopMonMiniChart(); // đặc biệt

        renderOverviewChart();    // biểu đồ tổng hợp
        renderTopMenuChart();     // top 5 thực đơn
    });

})(jQuery);
