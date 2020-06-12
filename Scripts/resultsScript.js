Chart.defaults.global.elements.line.fill = false;
let addCountriesList= [];


let chartType = 'bar';
let numberOfCountries = 1;
let means = [];
let countries = [];

let data=null;
let backgroundChartColors =["rgba(255,0,0,0.5)","rgba(0,255,0,0.5)","rgba(0,0,255,0.5)","rgba(12,189,176,0.5)","rgba(149,176,73,0.5)","rgba(137,161,114,0.5)","rgba(86,88,168,0.5)","rgba(152,165,28,0.5)","rgba(57,82,111,0.5)","rgba(70,63,146,0.5)","rgba(122,57,0,0.5)","rgba(36,146,124,0.5)","rgba(205,34,126,0.5)","rgba(111,148,24,0.5)","rgba(57,35,209,0.5)","rgba(39,227,35,0.5)","rgba(22,137,116,0.5)","rgba(124,53,202,0.5)","rgba(16,66,187,0.5)","rgba(59,51,112,0.5)"];
let borderChartColors = ["rgba(255,0,0,1)","rgba(0,255,0,1)","rgba(0,0,255,1)"  ,"rgba(12,189,176,1)","rgba(149,176,73,1)","rgba(137,161,114,1)","rgba(86,88,168,1)","rgba(152,165,28,1)","rgba(57,82,111,1)","rgba(70,63,146,1)","rgba(122,57,0,1)","rgba(36,146,124,1)","rgba(205,34,126,1)","rgba(111,148,24,1)","rgba(57,35,209,1)","rgba(39,227,35,1)","rgba(22,137,116,1)","rgba(124,53,202,1)","rgba(16,66,187,1)","rgba(59,51,112,1)"];


function download(type) {
    data.options.animation=false;
    console.log(data);
    var ctx = document.getElementById("chart");
    var width=ctx.getBoundingClientRect().width;
    var height=ctx.getBoundingClientRect().height;
    var svgContext = C2S(width,height);
    var mySvg = new Chart(svgContext, data);

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
        dl.href = 'data:image/svg+xml;utf8,' + encodeURIComponent(svgString);
    }
    if(type==="PNG") {
        var canvas=document.getElementById("chart");
        var img=canvas.toDataURL("image/png");
        dl.download="Chart.png";
        dl.href=img;
    }
    if (type === "CSV") {     
        csv = "Country,Mean" + document.getElementById("indicator-combo-box").value.charAt(0).toUpperCase() + document.getElementById("indicator-combo-box").value.substr(1)  + "\r\n";
        for (var i = 0; i < countries.length; i++) {
            csv += countries[i].concat(",").concat(means[i]).concat("\r\n");
        }
       dl.download = "Chart.csv";
        dl.href = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv); 
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
    let countriesStr='';
    while(currentCountry)
    {
        countriesStr += "c".concat(i).concat("=").concat(currentCountry.options[currentCountry.selectedIndex].value.concat("&"));
        i += 1;
        currentCountry = document.getElementById("c".concat(i));
    }

    query += countriesStr;

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
        data=graphData;
        graphData.options.responsive=false;
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
        const chart = new Chart(ctx, graphData);

    }
    }
    xmlhttp.open("GET", "http://127.0.0.1/PIRO-PISA-ROMANIA/Results.php?".concat(query), true);
    xmlhttp.send();

}

window.onload = function ()
{
    //get the list of all countries from the db
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        
        const r_countries = JSON.parse(this.responseText);
        
        for(let i of Object.keys(r_countries))
        {
            addCountriesList[i]="<option value=\"".concat(r_countries[i]["Country"]).concat("\">").concat(r_countries[i]["Country"]).concat("</option>");        
        }
        
        }
    }

    xmlhttp.open("GET", "http://127.0.0.1/PIRO-PISA-ROMANIA/Results.php?allCountries=1", true);
    xmlhttp.send();
        

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
    document.getElementById("exportPNG").addEventListener("click", function(){
        download("PNG");
    });
    document.getElementById("exportSVG").addEventListener("click", function(){
        download("SVG");
    });
    document.getElementById("exportCSV").addEventListener("click", function(){
        download("CSV");
    });

    document.getElementById("btn-add-country").addEventListener("click", function(){
        if(numberOfCountries < 20)
        {
            numberOfCountries += 1;
            const countriesForm = document.getElementById("country-choice");
            countriesForm.insertAdjacentHTML("beforeend",
            "<select id=\"c".concat(numberOfCountries).concat("\" name=\"c").concat(numberOfCountries).concat("\">").concat(addCountriesList.join('')).concat("</select>")
            );
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
