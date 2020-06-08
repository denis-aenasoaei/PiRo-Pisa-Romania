let chartType = 'bar';

var data=null;
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
            document.getElementById("exportPNG").style.display="inline";
            document.getElementById("exportCSV").style.display="inline";
            document.getElementById("exportSVG").style.display="inline";
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
            const graphData={
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
            }
            console.log(means);
            graphData.options.responsive=false;
            data=graphData;
            const chart = new Chart(ctx, graphData);
        }
        };
        xmlhttp.open("GET", "http://127.0.0.1/PIRO-PISA-ROMANIA/Results.php?c1=".concat(c1).concat("&c2=").concat(c2), true);
        xmlhttp.send();
    });
}
function download(type) {
    var graphData=data;
    graphData.options.animation=false;
    graphData.options.responsive=false;

    const ctx = document.getElementById("myChart");
    var width=ctx.getBoundingClientRect().width;
    var height=ctx.getBoundingClientRect().height;
    const svgContext = C2S(width,height);
    const mySvg = new Chart(svgContext, graphData);
    mySvg.width=width;
    mySvg.height=height;

    var dl = document.createElement("a");
    document.body.appendChild(dl); // This line makes it work in Firefox.

    if (type=="SVG") {
        var svg = svgContext.getSvg();
        if (window.ActiveXObject) {
            svgString = svg.xml;
        } else {
            var oSerializer = new XMLSerializer();
            svgString = oSerializer.serializeToString(svg);
        }
        dl.download = "Chart.svg";
        //   return "data:image/svg+xml," + encodeURIComponent(svgAsXML);
        dl.href = 'data:image/svg+xml;utf8,' + encodeURIComponent(svgString);
    }
    if(type=="PNG") {
        var canvas=document.getElementById("myChart");
        var img=canvas.toDataURL("image/png");
        dl.download="Chart.png";
        dl.href=img;
    }
    if(type="CSV") {

    }
    dl.click();
    document.body.removeChild(dl);
}
