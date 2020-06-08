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
