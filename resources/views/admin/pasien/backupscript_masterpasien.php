 <script>
                new Vue({
                    el: '#appTodo',
                    data: {
                        content: "",
                        datalist: []
                    },
                    mounted: function () {
                    },
                    methods: {
                        submit: function () {
                            var form_data = new FormData();
                            form_data.append("content", this.content);
                            axios.post("{{url('/todolist/create')}}", form_data)
                                .then(Respon => {
                                    alert(Respon.data.message);
                                })
                                .catch(err => {
                                    alert("sistem failure");
                                })
                        },

                    }

                });



        new Vue({
            el: "#masterpasien",
            data: {

            },
            mounted: function () {
                this.lineChart();
            }
            methods: {
                tampilPasien: function (params) {
                    axios.get("daftarPasien").then()
                },

                lineChart: function () {
                alert('cek');
                var ctx = document.getElementById("lineChart");
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July"],
                        datasets: [{
                                label: "My First dataset",
                                borderColor: "rgba(144,	104,	190,.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(144,	104,	190,.7)",
                                data: [22, 44, 67, 43, 76, 45, 12]
                            },
                            {
                                label: "My Second dataset",
                                borderColor: "rgba(117, 113, 249, 0.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(117, 113, 249, 0.5)",
                                pointHighlightStroke: "rgba(117, 113, 249,1)",
                                data: [16, 32, 18, 26, 42, 33, 44]
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                });
            }
        }
        })

    </script>
