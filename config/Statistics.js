const ctx = document.getElementById('Chart').getContext('2d');
let myChart;
function Income() {
    $.ajax({
        url: "../php/Statistic/MonthlyIncome.php",
        method: "get",
        success: function (data) {
            let Obj = JSON.parse(data)
            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Obj.Date,
                    datasets: [{
                        label: 'VND',
                        data: Obj.Total,
                        backgroundColor: [
                            // 'rgba(255, 99, 132, 0.2)',
                            // 'rgba(54, 162, 235, 0.2)',
                            // 'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            // 'rgba(153, 102, 255, 0.2)',
                            // 'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            // 'rgba(255, 99, 132, 1)',
                            // 'rgba(54, 162, 235, 1)',
                            // 'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            // 'rgba(153, 102, 255, 1)',
                            // 'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    })
}
Income()
$("#choose-stat").on("change", () => {
    let type = $("#choose-stat").val()
    if (type == 'income') {
        myChart.destroy()
        Income()
    }
    if (type == 'orders') {
        myChart.destroy()
        $.ajax({
            url: "../php/Statistic/MonthlyOrder.php",
            method: "get",
            success: function (data) {
                let Obj = JSON.parse(data)
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: Obj.Date,
                        datasets: [{
                            label: 'Đơn hàng',
                            data: Obj.Order,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.2)'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        })
    }
    if (type == "ticket") {
        myChart.destroy()
        $.ajax({
            url: "../php/Statistic/MonthlyTicket.php",
            method: "get",
            success: function (data) {
                let Obj = JSON.parse(data)
                myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: Obj.Date,
                        datasets: [{
                            label: 'Vé máy bay',
                            data: Obj.Ticket,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.2)'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        })
    }
    if (type == "ticket-type") {
        myChart.destroy()
        $.ajax({
            url: "../php/Statistic/TicketType.php",
            method: "get",
            success: function (data) {
                let Obj = JSON.parse(data)
                myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: Obj.Class,
                        datasets: [{
                            label: 'Số lượng',
                            data: Obj.Ticket,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        })
    }
})