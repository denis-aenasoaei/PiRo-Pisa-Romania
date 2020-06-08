let chartType = 'bar';
let numberOfCountries = 1;
var data=null;
window.onload = function ()
{
    document.getElementById("btn-add-country").addEventListener("click", function(){
        if(numberOfCountries < 20)
        {
            const countriesForm = document.getElementById("country-choice");
            countriesForm.insertAdjacentHTML("beforeend",
            "<select id=\"c".concat(numberOfCountries).concat("\" name=\"c").concat(numberOfCountries).concat("\"><option value=\"Albania\"> Albania </option><option value=\"Argentina\"> Argentina </option><option value=\"Australia\"> Australia </option><option value=\"Austria\"> Austria </option><option value=\"B-S-J-Z (China)\"> China </option><option value=\"Baku (Azerbaijan)\"> Azerbaijan </option><option value=\"Belarus\"> Belarus </option><option value=\"Belgium\"> Belgium </option><option value=\"Bosnia and Herzegovina\"> Bosnia and Herzegovina </option><option value=\"Brazil\"> Brazil </option><option value=\"Brunei Darussalam\"> Brunei </option><option value=\"Austria\"> Austria </option><option value=\"Bulgaria\"> Bulgaria </option><option value=\"Canada\"> Canada </option><option value=\"Chile\"> Chile </option><option value=\"Chinese Taipei\"> Chinese Taipei </option><option value=\"Colombia\"> Colombia </option><option value=\"Costa Rica\"> Costa Rica </option><option value=\"Croatia\"> Croatia </option><option value=\"Cyprus\"> Cyprus </option><option value=\"Czech Republic\"> Czech Republic </option><option value=\"Denmark\"> Denmark </option><option value=\"Dominican Republic\"> Dominican Republic </option><option value=\"Estonia\"> Estonia </option><option value=\"Finland\"> Finland </option><option value=\"France\"> France </option><option value=\"Georgia\"> Georgia </option><option value=\"Germany\"> Germany </option><option value=\"Greece\"> Greece </option><option value=\"Hong Kong (China)*\"> Hong Kong (China) </option><option value=\"Hungary\"> Hungary </option><option value=\"Iceland\"> Iceland </option><option value=\"Indonesia\"> Indonesia </option><option value=\"Ireland\"> Ireland </option><option value=\"Israel\"> Israel </option><option value=\"Italy\"> Italy </option><option value=\"Japan\"> Japan </option><option value=\"Jordan\"> Jordan </option><option value=\"Kazakhstan\"> Kazakhstan </option><option value=\"Korea\"> Korea </option><option value=\"Kosovo\"> Kosovo </option><option value=\"Latvia\"> Latvia </option><option value=\"Lebanon\"> Lebanon </option><option value=\"Lithuania\"> Lithuania </option><option value=\"Luxembourg\"> Luxembourg </option><option value=\"Macao (China)\"> Macao (China) </option><option value=\"Malaysia\"> Malaysia </option><option value=\"Malta\"> Malta </option><option value=\"Mexico\"> Mexico </option><option value=\"Moldova\"> Moldova </option><option value=\"Montenegro\"> Montenegro </option><option value=\"Netherlands*\"> Netherlands </option><option value=\"New Zealand\"> New Zealand </option><option value=\"North Macedonia\"> North Macedonia </option><option value=\"OECD average\"> OECD average </option><option value=\"Panama\"> Panama </option><option value=\"Peru\"> Peru </option><option value=\"Philippines\"> Philippines </option><option value=\"Poland\"> Poland </option><option value=\"Portugal*\"> Portugal </option><option value=\"Qatar\"> Qatar </option><option value=\"Romania\"> Romania </option><option value=\"Russia\"> Russia </option><option value=\"Saudi Arabia\"> Saudi Arabia </option><option value=\"Serbia\"> Serbia </option><option value=\"Singapore\"> Singapore </option><option value=\"Slovak Republic\"> Slovak Republic </option><option value=\"Slovenia\"> Slovenia </option><option value=\"Spain\"> Spain </option><option value=\"Sweeden\"> Sweeden </option><option value=\"Switzerland\"> Switzerland </option><option value=\"Thailand\"> Thailand </option><option value=\"Turkey\"> Turkey </option><option value=\"Ukraine\"> Ukraine </option><option value=\"United Arab Emirates\"> United Arab Emirates </option><option value=\"United Kingdom\"> United Kingdom </option><option value=\"United States*\"> United States </option><option value=\"Uruguay\"> Uruguay </option><option value=\"Viet Nam\"> Viet Nam </option></select>")
            )
            numberOfCountries += 1;
        }
    });
    document.getElementById("btn-remove-country").addEventListener("click", function(){
        if(numberOfCountries > 1)
        {
            const countriesForm = document.getElementById("country-choice");
            countriesForm.lastChild.remove();
            numberOfCountries -= 1;
        }
    });



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
        
            graphData.options.responsive=false;
            data=graphData;
            const chart = new Chart(ctx, graphData);
    }
    }
    })

    // document.getElementById("testButton").addEventListener("click", function(){

    //     let c1 = document.getElementById("c1").value;
    //     let c2 = document.getElementById("c2").value;
    //     var xmlhttp = new XMLHttpRequest();
    //     xmlhttp.onreadystatechange = function() {
    //     if (this.readyState == 4 && this.status == 200) {
    //         document.getElementById("myChart").remove(); 
    //         div = document.querySelector("#chartContainer");
    //         div.insertAdjacentHTML("afterbegin", "<canvas id='myChart'></canvas>");
    //         let scores = JSON.parse(this.responseText);
    //         let countries = [];
    //         let means = [];
    //         for(let i of Object.keys(scores) )
    //         {
    //             means.push(scores[i]["MEAN"]);
    //             countries.push(scores[i]["Country"]);
    //         }

    //         const ctx = document.getElementById("myChart").getContext('2d');
    //         const chart = new Chart(ctx, {
    //             type: 'bar',
    //             data: {
    //                 labels: countries,
    //                 datasets: [{
    //                     label: 'PISA Test Scores',
    //                     data: means,
    //                     borderWidth: 1
    //                 }]
    //             },
    //             options: {
    //                 scales: {
    //                     yAxes: [{
    //                         ticks: {
    //                             beginAtZero: true
    //                         }
    //                     }]
    //                 }
    //             }
    //         });

    //     }
    //     };
    //     xmlhttp.open("GET", "http://127.0.0.1/PIRO-PISA-ROMANIA/Results.php?c1=".concat(c1).concat("&c2=").concat(c2), true);
    //     xmlhttp.send();
    // });

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
   }
