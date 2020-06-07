let chartType = 'bar';

window.onload = function ()
{
    document.getElementById("testButton").addEventListener("click", function(){
        let c1 = document.getElementById("c1").value;
        let c2 = document.getElementById("c2").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("myChart").remove(); 
            div = document.querySelector("#chartContainer");
            div.insertAdjacentHTML("afterbegin", "<canvas id='myChart'></canvas>");
            let scores = JSON.parse(this.responseText);
            let countries = [];
            let means = [];
            for(let i of Object.keys(scores) )
            {
                means.push(scores[i]["MEAN"]);
                countries.push(scores[i]["Country"]);
            }

            const ctx = document.getElementById("myChart").getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: countries,
                    datasets: [{
                        label: 'PISA Test Scores',
                        data: means,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        }
        };
        xmlhttp.open("GET", "http://127.0.0.1/PIRO-PISA-ROMANIA/Results.php?c1=".concat(c1).concat("&c2=").concat(c2), true);
        xmlhttp.send();
    });
}
