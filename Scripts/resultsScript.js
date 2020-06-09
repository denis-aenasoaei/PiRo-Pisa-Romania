Chart.defaults.global.elements.line.fill = false;

let chartType = 'bar';
let numberOfCountries = 1;
let means = [];
let countries = [];

let data=null;
let backgroundChartColors =["rgba(255,0,0,0.5)","rgba(0,255,0,0.5)","rgba(0,0,255,0.5)","rgba(12,189,176,0.5)","rgba(149,176,73,0.5)","rgba(137,161,114,0.5)","rgba(86,88,168,0.5)","rgba(152,165,28,0.5)","rgba(57,82,111,0.5)","rgba(70,63,146,0.5)","rgba(122,57,0,0.5)","rgba(36,146,124,0.5)","rgba(205,34,126,0.5)","rgba(111,148,24,0.5)","rgba(57,35,209,0.5)","rgba(39,227,35,0.5)","rgba(22,137,116,0.5)","rgba(124,53,202,0.5)","rgba(16,66,187,0.5)","rgba(59,51,112,0.5)"];
let borderChartColors = ["rgba(255,0,0,1)","rgba(0,255,0,1)","rgba(0,0,255,1)"  ,"rgba(12,189,176,1)","rgba(149,176,73,1)","rgba(137,161,114,1)","rgba(86,88,168,1)","rgba(152,165,28,1)","rgba(57,82,111,1)","rgba(70,63,146,1)","rgba(122,57,0,1)","rgba(36,146,124,1)","rgba(205,34,126,1)","rgba(111,148,24,1)","rgba(57,35,209,1)","rgba(39,227,35,1)","rgba(22,137,116,1)","rgba(124,53,202,1)","rgba(16,66,187,1)","rgba(59,51,112,1)"];


function download(type) {
    var graphData=data;
    graphData.options.animation=false;
    graphData.options.responsive=false;

    const ctx = document.getElementById("chart");
    var width=ctx.getBoundingClientRect().width;
    var height=ctx.getBoundingClientRect().height;
    const svgContext = C2S(width,height);
    const mySvg = new Chart(svgContext, graphData);
    mySvg.width=width;
    mySvg.height=height;

    var dl = document.createElement("a");
    document.body.appendChild(dl); // This line makes it work in Firefox.

    if (type==="SVG") {
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
    if(type==="PNG") {
        var canvas=document.getElementById("chart");
        var img=canvas.toDataURL("image/png");
        dl.download="Chart.png";
        dl.href=img;
    }
    if (type === "CSV") {
        var str = '';

        for (var i = 0; i < means.length; i++) {
            var line = '';
            for (var index in means[i]) {
                if (line != '') line += ','

                line += means[i][index];
            }

            str += line + '\r\n';
        }

        if (navigator.appName != 'Microsoft Internet Explorer') {
            window.open('data:text/csv;charset=utf-8,' + escape(str));
        }
        else {
            window.open('data:text / csv; charset = utf - 8; base64, ' + $.base64Encode(output));
        }     
    }
    dl.click();
    document.body.removeChild(dl);
} 

function toggleFilters(show)
{
    const x = document.getElementById("filter-wrapper");
    if (show) {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function checkIfRomaniaAndGetData(){
    let currentCountry = document.getElementById("c1");
    let i=1;
    while(currentCountry)
    {
        if(currentCountry.options[currentCountry.selectedIndex].value === "Romania")
        {
                toggleFilters(true);
                break;
        }
        currentCountry = document.getElementById("c".concat(i));
        i+=1;
    }
    if(currentCountry === null)
    {
        toggleFilters(false);
    }
    getDataAndCreateChart();

}


function getDataAndCreateChart(){
    
    let query='';
    let currentCountry = document.getElementById("c1");
    let i=1;
    let countries='';
    while(currentCountry)
    {
        countries += "c".concat(i).concat("=").concat(currentCountry.options[currentCountry.selectedIndex].value.concat("&"));
        i += 1;
        currentCountry = document.getElementById("c".concat(i));
    }

    query += countries;

    let age15 = document.getElementById("age_15");
    let age16 = document.getElementById("age_16");
    
    let grade9 = document.getElementById("grade_9");
    let grade10 = document.getElementById("grade_10");

    if(age15.checked && !age16.checked)
    {
        query += "age=15&";
    }

    if(!age15.checked && age16.checked)
    {
        query += "age=16&";
    }

    if(grade9.checked && !grade10.checked)
    {
        query += "school_grade=9&";
    }

    if(!grade9.checked && grade10.checked)
    {
        query += "school_grade=10&";
    }

    let income = document.getElementById("gender-combo-box");

    if(income.options[income.selectedIndex].value == 1)
    {
        query += "gender=1&";
    }

    if(income.options[income.selectedIndex].value == 2)
    {
        query += "gender=2&";
    }

    let wealth=document.getElementById("wealth-combo-box");

    if(wealth.options[wealth.selectedIndex].value == "LOW")
    {
        query += "wealth_range=LOW&";
    }
    if(wealth.options[wealth.selectedIndex].value == "MEDIUM")
    {
        query += "wealth_range=MEDIUM&";
    }
    if(wealth.options[wealth.selectedIndex].value == "HIGH")
    {
        query += "wealth_range=HIGH&";
    }

    let indicator = document.getElementById("indicator-combo-box");

    if(indicator.options[indicator.selectedIndex].value == "reading")
    {
        query += "mean_type=read&"
    }
    if(indicator.options[indicator.selectedIndex].value == "math")
    {
        query += "mean_type=math&"
    }
    if(indicator.options[indicator.selectedIndex].value == "science")
    {
        query += "mean_type=science&"
    }

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        document.getElementById("chart").remove(); 
        div = document.querySelector("#chart-container");
        document.getElementById("exportPNG").style.display="inline";
        document.getElementById("exportCSV").style.display="inline";
        document.getElementById("exportSVG").style.display="inline";
        div.insertAdjacentHTML("afterbegin", "<canvas id='chart'></canvas>");
        let scores = JSON.parse(this.responseText);
        countries = [];
        means = [];
        for(let i of Object.keys(scores) )
        {
            means.push(scores[i]["MEAN"]);
            countries.push(scores[i]["Country"]);
        }
        const ctx = document.getElementById("chart").getContext('2d');
        let graphData = {};
        if(chartType == 'bar')
        { 
            graphData={
            type: chartType,
            data: {
                labels: countries,
                datasets: [{
                    data: means,
                    backgroundColor: backgroundChartColors,
                    borderColor: borderChartColors,
                    borderWidth: 1
                }]

            },
            options:{
                legend:{
                    display:false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        }
        }
        else if(chartType == 'points')
        {
            graphData={
                type: 'line',
                data: {
                    labels: "PisaTestResults",
                    datasets: []
                },
                options:{
                    legend:{
                        display:true
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                min:0,
                                max:600
                            }
                        }]
                    }
                }
            }
            for(let i=0;i<means.length;i++)
            {
                graphData.data.datasets.push({
                    label: countries[i],
                    data: [null, null, null, null,null, null, null, means[i]],
                    borderColor:borderChartColors[i],
                    borderWidth:10
                })
            }
        }
        else if(chartType == 'polarArea')
        {
            graphData = {
                type:'polarArea',
                data: {
                    labels: countries,
                    datasets:[{
                        data:means,
                        backgroundColor:backgroundChartColors,
                        borderColor: borderChartColors
                    }]
                },
                options:{
                    scale:{
                        ticks: {
                            min:300,
                            max:580
                        }
                    }
                }
            }
        }
           

        graphData.options.responsive=false;
        data=graphData;
        console.log(graphData);
        const chart = new Chart(ctx, graphData);

    }
    }
    xmlhttp.open("GET", "http://127.0.0.1/PIRO-PISA-ROMANIA/Results.php?".concat(query), true);
    xmlhttp.send();

}

window.onload = function ()
{
    document.getElementById("button-barchart").addEventListener("click", function(){
        chartType="bar";
        getDataAndCreateChart();
    });
    document.getElementById("button-point").addEventListener("click", function(){
        chartType="points";
        getDataAndCreateChart();
    });
    document.getElementById("button-polar").addEventListener("click", function(){
        chartType="polarArea";
        getDataAndCreateChart();
    });

    document.getElementById("btn-add-country").addEventListener("click", function(){
        if(numberOfCountries < 20)
        {
            numberOfCountries += 1;
            const countriesForm = document.getElementById("country-choice");
            countriesForm.insertAdjacentHTML("beforeend",
            "<select id=\"c".concat(numberOfCountries).concat("\" name=\"c").concat(numberOfCountries).concat("\"><option value=\"Romania\"> Romania </option><option value=\"Albania\"> Albania </option><option value=\"Argentina\"> Argentina </option><option value=\"Australia\"> Australia </option><option value=\"Austria\"> Austria </option><option value=\"B-S-J-Z (China)\"> China </option><option value=\"Baku (Azerbaijan)\"> Azerbaijan </option><option value=\"Belarus\"> Belarus </option><option value=\"Belgium\"> Belgium </option><option value=\"Bosnia and Herzegovina\"> Bosnia and Herzegovina </option><option value=\"Brazil\"> Brazil </option><option value=\"Brunei Darussalam\"> Brunei </option><option value=\"Austria\"> Austria </option><option value=\"Bulgaria\"> Bulgaria </option><option value=\"Canada\"> Canada </option><option value=\"Chile\"> Chile </option><option value=\"Chinese Taipei\"> Chinese Taipei </option><option value=\"Colombia\"> Colombia </option><option value=\"Costa Rica\"> Costa Rica </option><option value=\"Croatia\"> Croatia </option><option value=\"Cyprus\"> Cyprus </option><option value=\"Czech Republic\"> Czech Republic </option><option value=\"Denmark\"> Denmark </option><option value=\"Dominican Republic\"> Dominican Republic </option><option value=\"Estonia\"> Estonia </option><option value=\"Finland\"> Finland </option><option value=\"France\"> France </option><option value=\"Georgia\"> Georgia </option><option value=\"Germany\"> Germany </option><option value=\"Greece\"> Greece </option><option value=\"Hong Kong (China)*\"> Hong Kong (China) </option><option value=\"Hungary\"> Hungary </option><option value=\"Iceland\"> Iceland </option><option value=\"Indonesia\"> Indonesia </option><option value=\"Ireland\"> Ireland </option><option value=\"Israel\"> Israel </option><option value=\"Italy\"> Italy </option><option value=\"Japan\"> Japan </option><option value=\"Jordan\"> Jordan </option><option value=\"Kazakhstan\"> Kazakhstan </option><option value=\"Korea\"> Korea </option><option value=\"Kosovo\"> Kosovo </option><option value=\"Latvia\"> Latvia </option><option value=\"Lebanon\"> Lebanon </option><option value=\"Lithuania\"> Lithuania </option><option value=\"Luxembourg\"> Luxembourg </option><option value=\"Macao (China)\"> Macao (China) </option><option value=\"Malaysia\"> Malaysia </option><option value=\"Malta\"> Malta </option><option value=\"Mexico\"> Mexico </option><option value=\"Moldova\"> Moldova </option><option value=\"Montenegro\"> Montenegro </option><option value=\"Netherlands*\"> Netherlands </option><option value=\"New Zealand\"> New Zealand </option><option value=\"North Macedonia\"> North Macedonia </option><option value=\"OECD average\"> OECD average </option><option value=\"Panama\"> Panama </option><option value=\"Peru\"> Peru </option><option value=\"Philippines\"> Philippines </option><option value=\"Poland\"> Poland </option><option value=\"Portugal*\"> Portugal </option><option value=\"Qatar\"> Qatar </option><option value=\"Russia\"> Russia </option><option value=\"Saudi Arabia\"> Saudi Arabia </option><option value=\"Serbia\"> Serbia </option><option value=\"Singapore\"> Singapore </option><option value=\"Slovak Republic\"> Slovak Republic </option><option value=\"Slovenia\"> Slovenia </option><option value=\"Spain\"> Spain </option><option value=\"Sweden\"> Sweden </option><option value=\"Switzerland\"> Switzerland </option><option value=\"Thailand\"> Thailand </option><option value=\"Turkey\"> Turkey </option><option value=\"Ukraine\"> Ukraine </option><option value=\"United Arab Emirates\"> United Arab Emirates </option><option value=\"United Kingdom\"> United Kingdom </option><option value=\"United States*\"> United States </option><option value=\"Uruguay\"> Uruguay </option><option value=\"Viet Nam\"> Viet Nam </option></select>")
            )
            document.getElementById("c".concat(numberOfCountries)).addEventListener("change", checkIfRomaniaAndGetData);
            
            checkIfRomaniaAndGetData();
        }
    });
    document.getElementById("btn-remove-country").addEventListener("click", function(){
        if(numberOfCountries > 1)
        {
            numberOfCountries -= 1;
            const countriesForm = document.getElementById("country-choice");
            countriesForm.lastChild.removeEventListener("change", checkIfRomaniaAndGetData);
            countriesForm.lastChild.remove();
        }
    });
    
    document.getElementById("indicator-combo-box").addEventListener("change", getDataAndCreateChart);
    document.getElementById("gender-combo-box").addEventListener("change", getDataAndCreateChart);
    document.getElementById("wealth-combo-box").addEventListener("change", this.getDataAndCreateChart);
    document.getElementById("c1").addEventListener("change", this.checkIfRomaniaAndGetData);
    document.getElementById("grade_9").addEventListener('change', getDataAndCreateChart);
    document.getElementById("grade_10").addEventListener('change', getDataAndCreateChart);
    document.getElementById("age_15").addEventListener('change', getDataAndCreateChart);
    document.getElementById("age_16").addEventListener('change', getDataAndCreateChart);

    this.checkIfRomaniaAndGetData();

}
