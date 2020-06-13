let method = 'POST';
let select_data;
function deleteCookies(){
    document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "uuid=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    window.location.replace("Login.php");
}


function sendRequest(){
    const table = document.getElementById("table-name").options[document.getElementById("table-name").selectedIndex].value;
    let value=document.getElementById("action-type").options[document.getElementById("action-type").selectedIndex].value;
    let method="POST";

    let queryString = "table=".concat(table).concat("&type=").concat(value).concat("&");
    if(table === "Administrators")
    {
        if(value === 'delete')
        {
            queryString = queryString.concat("user=").concat(document.getElementById('input1').value).concat("&");
        }
        else
        {
            queryString = queryString.concat("user=").concat(document.getElementById('input1').value).concat("&pass=")
                        .concat(document.getElementById('input2').value);
        }
    }
    else if(table === 'country_scores'){
        queryString = queryString.concat("country=").concat(document.getElementById('input1').value);
        if(value==='add' || value==='update' || value==='select')
        {
            queryString = queryString.concat("&read=").concat(document.getElementById("input2").value);
            queryString = queryString.concat("&math=").concat(document.getElementById("input3").value);
            queryString = queryString.concat("&science=").concat(document.getElementById("input4").value);
        }

    }
    else if(table === 'romania_data'){
        queryString = queryString.concat("stud_id=").concat(document.getElementById('input1').value);
        if(value==='add' || value==='update' || value==='select')
        {
            queryString = queryString.concat("&read=").concat(document.getElementById("input2").value);
            queryString = queryString.concat("&math=").concat(document.getElementById("input3").value);
            queryString = queryString.concat("&science=").concat(document.getElementById("input4").value);

            queryString = queryString.concat("&gender=").concat(document.getElementById("input5").value);
            queryString = queryString.concat("&school_grade=").concat(document.getElementById("input6").value);
            queryString = queryString.concat("&age=").concat(document.getElementById("input7").value);
            queryString = queryString.concat("&wealth_range=").concat(document.getElementById("input8").value);
            
        }
    }

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if(this.status == 200)
            {
                alert("SUCCESS!");
            }
            else
            {
                alert("FAILURE! PLEASE CHECK AGAIN INSERTED VALUES AND TRY AGAIN!");
            }
        }
    }
    xmlhttp.open(method, "http://127.0.0.1/PIRO-PISA-ROMANIA/Admin.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(queryString);

}

function putData(){
    let json;
    if(Object.keys(select_data).length<1) {
        alert("No data was selected");
        return false;
    }
    else
        json=select_data;
    let table = document.getElementById("select-data");
    table.innerHTML="";
    table.classList.remove("hidden");
    let pages = document.getElementById("pages");
    pages.classList.remove("hidden");
    let table_type=document.getElementById("table-form").options[document.getElementById("table-form").selectedIndex].value;
    let row=document.createElement("tr");
    let theader=document.createElement("th");
    theader.innerHTML="Nr_crt";
    row.appendChild(theader);
    if(table_type==="Administrators"){
        theader=document.createElement("th");
        theader.innerHTML="User";
        row.appendChild(theader);
        theader=document.createElement("th");
        theader.innerHTML="Password";
        row.appendChild(theader);
    }
    else if(table_type==="romania_data"){
        theader=document.createElement("th");
        theader.innerHTML="StudID";
        row.appendChild(theader);
        theader=document.createElement("th");
        theader.innerHTML="Math_grade";
        row.appendChild(theader);
        theader=document.createElement("th");
        theader.innerHTML="Read_grade";
        row.appendChild(theader);
        theader=document.createElement("th");
        theader.innerHTML="Science_grade";
        row.appendChild(theader);
        theader=document.createElement("th");
        theader.innerHTML="Gender";
        row.appendChild(theader);
        theader=document.createElement("th");
        theader.innerHTML="Age";
        row.appendChild(theader);
        theader=document.createElement("th");
        theader.innerHTML="School_grade";
        row.appendChild(theader);
        theader=document.createElement("th");
        theader.innerHTML="Wealth_range";
        row.appendChild(theader);
    }
    else if(table_type==="country_scores"){
        theader=document.createElement("th");
        theader.innerHTML="Country";
        row.appendChild(theader);
        theader=document.createElement("th");
        theader.innerHTML="Math_mean";
        row.appendChild(theader);
        theader=document.createElement("th");
        theader.innerHTML="Read_mean";
        row.appendChild(theader);
        theader=document.createElement("th");
        theader.innerHTML="Science_mean";
        row.appendChild(theader);
    }
    table.appendChild(row);
    for(let i=0;i<10;i++){
        let row=document.createElement("tr");
        row.id="row".concat((i+1).toString());
        table.appendChild(row);
    }
    let cell;

    let page=document.getElementById("box_page");
    page.max=Math.floor(Object.keys(json).length/10)+1;
    let current_page=page.value-1;

    for(let j=current_page*10;j<(current_page+1)*10 && j<Object.keys(json).length;j++){
        let i=j%10;
        row=document.getElementById("row".concat((i+1).toString()));

        cell=document.createElement("td");
        cell.innerHTML=(i+1).toString();
        row.appendChild(cell);

        if(table_type==="Administrators"){
            cell=document.createElement("td");
            cell.innerHTML=json[i][1];
            row.appendChild(cell);
            cell=document.createElement("td");
            cell.innerHTML=json[i][2];
            row.appendChild(cell);
        }
        else if(table_type==="romania_data"){
            cell=document.createElement("td");
            cell.innerHTML=json[i][0];
            row.appendChild(cell);
            cell=document.createElement("td");
            cell.innerHTML=json[i][1];
            row.appendChild(cell);
            cell=document.createElement("td");
            cell.innerHTML=json[i][2];
            row.appendChild(cell);
            cell=document.createElement("td");
            cell.innerHTML=json[i][3];
            row.appendChild(cell);
            cell=document.createElement("td");
            cell.innerHTML=json[i][4];
            row.appendChild(cell);
            cell=document.createElement("td");
            cell.innerHTML=json[i][5];
            row.appendChild(cell);
            cell=document.createElement("td");
            cell.innerHTML=json[i][6];
            row.appendChild(cell);
            cell=document.createElement("td");
            cell.innerHTML=json[i][7];
            row.appendChild(cell);
        }
        else if(table_type==="country_scores"){
            cell=document.createElement("td");
            cell.innerHTML=json[i][0];
            row.appendChild(cell);
            cell=document.createElement("td");
            cell.innerHTML=json[i][2];
            row.appendChild(cell);
            cell=document.createElement("td");
            cell.innerHTML=json[i][1];
            row.appendChild(cell);
            cell=document.createElement("td");
            cell.innerHTML=json[i][3];
            row.appendChild(cell);
        }
    }
    let tmp=document.getElementById("box_page");
    tmp.value=1;
}
function changeData(){
    let page=document.getElementById("box_page");
    let table_type=document.getElementById("table-form").options[document.getElementById("table-form").selectedIndex].value;
    let current_page=page.value-1;
    let row;
    let cell;
    let json=select_data;
    let i,j;
    for (j = current_page * 10; j < (current_page + 1) * 10 && j < Object.keys(json).length; j++) {
        i = j % 10;
        row = document.getElementById("row".concat((i + 1).toString()));
        row.innerHTML="";
        cell = document.createElement("td");
        cell.innerHTML = current_page*10+i+1;
        row.appendChild(cell);

        if (table_type === "Administrators") {
            cell = document.createElement("td");
            cell.innerHTML = json[j][1];
            row.appendChild(cell);
            cell = document.createElement("td");
            cell.innerHTML = json[j][2];
            row.appendChild(cell);
        }
        else if (table_type === "romania_data") {
            cell = document.createElement("td");
            cell.innerHTML = json[j][0];
            row.appendChild(cell);
            cell = document.createElement("td");
            cell.innerHTML = json[j][1];
            row.appendChild(cell);
            cell = document.createElement("td");
            cell.innerHTML = json[j][2];
            row.appendChild(cell);
            cell = document.createElement("td");
            cell.innerHTML = json[j][3];
            row.appendChild(cell);
            cell = document.createElement("td");
            cell.innerHTML = json[j][4];
            row.appendChild(cell);
            cell = document.createElement("td");
            cell.innerHTML = json[j][5];
            row.appendChild(cell);
            cell = document.createElement("td");
            cell.innerHTML = json[j][6];
            row.appendChild(cell);
            cell = document.createElement("td");
            cell.innerHTML = json[j][7];
            row.appendChild(cell);
        }
        else if (table_type === "country_scores") {
            cell = document.createElement("td");
            cell.innerHTML = json[j][0];
            row.appendChild(cell);
            cell = document.createElement("td");
            cell.innerHTML = json[j][2];
            row.appendChild(cell);
            cell = document.createElement("td");
            cell.innerHTML = json[j][1];
            row.appendChild(cell);
            cell = document.createElement("td");
            cell.innerHTML = json[j][3];
            row.appendChild(cell);
        }
    }
    if(j >= Object.keys(json).length){
        for(i=j%10;i<10;i++)
        {
            row = document.getElementById("row".concat((i + 1).toString()));
            row.innerHTML="<td></td>";
        }
    }
}

function selectRequest(){
    const table = document.getElementById("table-form").options[document.getElementById("table-form").selectedIndex].value;
    let method="POST";

    let queryString = "table=".concat(table).concat("&type=select");
    let value=[];
    for(let i=0; i<8; i++){
        value.push(document.getElementById('box_in'.concat((i+1).toString())).value);
    }
    if(table === "Administrators"){
        if(value[0]!=="")
            queryString = queryString.concat("&user=").concat(value[0]);
    }
    else if(table === 'country_scores'){
        if(value[0]!=="")
            queryString = queryString.concat("&country=").concat(value[0]);
        if(value[1]!=="")
            queryString = queryString.concat("&math=").concat(value[1]);
        if(value[2]!=="")
            queryString = queryString.concat("&read=").concat(value[2]);
        if(value[3]!=="")
            queryString = queryString.concat("&science=").concat(value[3]);

    }
    else if(table === 'romania_data'){
        if(value[0]!=="")
            queryString = queryString.concat("&stud_id=").concat(value[0]);
        if(value[1]!=="")
            queryString = queryString.concat("&math=").concat(value[1]);
        if(value[2]!=="")
            queryString = queryString.concat("&read=").concat(value[2]);
        if(value[3]!=="")
            queryString = queryString.concat("&science=").concat(value[3]);
        if(value[4]!=="")
            queryString = queryString.concat("&gender=").concat(value[4]);
        if(value[5]!=="")
            queryString = queryString.concat("&school_grade=").concat(value[5]);
        if(value[6]!=="")
            queryString = queryString.concat("&age=").concat(value[6]);
        if(value[7]!=="")
            queryString = queryString.concat("&wealth_range=").concat(value[7]);
    }
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if(this.status === 200)
            {
                //alert("SUCCESS!");
                //console.log(xmlhttp.responseText);
                select_data=JSON.parse(xmlhttp.responseText);
                putData();
            }
            else
            {
                alert("FAILURE! PLEASE CHECK AGAIN INSERTED VALUES AND TRY AGAIN!");
            }
        }
    }
    xmlhttp.open(method, "http://127.0.0.1/PIRO-PISA-ROMANIA/Admin.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(queryString);
}

function displayElements(mode,labels,inputs){
    for (const label of labels){
        let current_label=document.getElementById("label_in".concat(label));
        if(current_label.className.indexOf("hidden")===-1 && mode==="hide")
            current_label.className += " hidden";
        if(current_label.className.indexOf("hidden")!==-1 && mode==="show")
            current_label.classList.remove("hidden");
    }
    for(const input of inputs){
        let current_input=document.getElementById("box_in".concat(input));
        if(current_input.className.indexOf("hidden")===-1 && mode==="hide") {
            current_input.className += " hidden";
        }
        if(current_input.className.indexOf("hidden")!==-1 && mode==="show")
            current_input.classList.remove("hidden");
    }
}

function setLabels(table){
    if(table==="Administrators"){
        document.getElementById("label_in1").innerText="Username:";
    }
    else if(table==="romania_data"){
        document.getElementById("label_in1").innerText="StudID:";
        document.getElementById("label_in2").innerText="Math grade:";
        document.getElementById("label_in3").innerText="Read grade:";
        document.getElementById("label_in4").innerText="Science grade:";
    }
    else if(table==="country_scores"){
        document.getElementById("label_in1").innerText="Country:";
        document.getElementById("label_in2").innerText="Math mean:";
        document.getElementById("label_in3").innerText="Read mean:";
        document.getElementById("label_in4").innerText="Science mean:";
    }
}

function clearInputs(){
    document.getElementById("box_in1").value="";
    document.getElementById("box_in2").value="";
    document.getElementById("box_in3").value="";
    document.getElementById("box_in4").value="";
}

window.onload = function () {
    document.getElementById("logout").addEventListener("click", function () {
        deleteCookies();
    });

    document.getElementById("btn-submit").addEventListener("click", function(){
        sendRequest();
    })

    document.getElementById("action-type").addEventListener("change", function(){
        const action = document.getElementById("action-type");
        const table = document.getElementById("table-name").options[document.getElementById("table-name").selectedIndex].value;
        const value=action.options[action.selectedIndex].value;
        if(value === "add" || value === "update" || value==="select"){
            if(table === "Administrators")
            {
                document.getElementById("LB_input1").innerHTML = " Username: ";
                document.getElementById("LB_input2").innerHTML = " Password: ";
                if(value==="select") {
                    document.getElementById("input2").className += " hidden";
                    document.getElementById("LB_input2").className += " hidden";
                }
                else {
                    document.getElementById("input2").classList.remove("hidden");
                    document.getElementById("LB_input2").classList.remove("hidden");
                    document.getElementById("input2").type = "password";
                }

                document.getElementById("input3").className += " hidden";
                document.getElementById("input4").className += " hidden";
                document.getElementById("input5").className += " hidden";
                document.getElementById("input6").className += " hidden";
                document.getElementById("input7").className += " hidden";
                document.getElementById("input8").className += " hidden";
                
                document.getElementById("LB_input3").className += " hidden";
                document.getElementById("LB_input4").className += " hidden";
                document.getElementById("LB_input5").className += " hidden";
                document.getElementById("LB_input6").className += " hidden";
                document.getElementById("LB_input7").className += " hidden";
                document.getElementById("LB_input8").className += " hidden";
            }
            else if(table === "romania_data")
            {
                document.getElementById("input3").classList.remove("hidden");
                document.getElementById("LB_input3").classList.remove("hidden");
                document.getElementById("input4").classList.remove("hidden");
                document.getElementById("LB_input4").classList.remove("hidden");
                document.getElementById("input5").classList.remove("hidden");
                document.getElementById("LB_input5").classList.remove("hidden");
                document.getElementById("input6").classList.remove("hidden");
                document.getElementById("LB_input6").classList.remove("hidden");
                document.getElementById("input7").classList.remove("hidden");
                document.getElementById("LB_input7").classList.remove("hidden");
                document.getElementById("input8").classList.remove("hidden");
                document.getElementById("LB_input8").classList.remove("hidden");
                
                document.getElementById("input2").classList.remove("hidden");
                document.getElementById("LB_input2").classList.remove("hidden"); 
                
                document.getElementById("input2").type = "text";
                   
                
                document.getElementById("LB_input1").innerHTML = " Id student: ";
                document.getElementById("LB_input2").innerHTML = " Reading score: ";
                document.getElementById("LB_input3").innerHTML = " Math score: "
                document.getElementById("LB_input4").innerHTML = " Science score: "
            }
            else if(table === "country_scores")
            {
                document.getElementById("input2").classList.remove("hidden");
                document.getElementById("LB_input2").classList.remove("hidden");
                document.getElementById("input3").classList.remove("hidden");
                document.getElementById("LB_input3").classList.remove("hidden");
                document.getElementById("input4").classList.remove("hidden");
                document.getElementById("LB_input4").classList.remove("hidden");
                
                document.getElementById("input2").type = "text";
                

                document.getElementById("LB_input1").innerHTML = " Country: ";
                document.getElementById("LB_input2").innerHTML = " Reading score mean ";
                document.getElementById("LB_input3").innerHTML = " Math score mean ";
                document.getElementById("LB_input4").innerHTML = " Science score mean ";

                document.getElementById("input5").className += " hidden";
                document.getElementById("input6").className += " hidden";
                document.getElementById("input7").className += " hidden";
                document.getElementById("input8").className += " hidden";
                
                document.getElementById("LB_input5").className += " hidden";
                document.getElementById("LB_input6").className += " hidden";
                document.getElementById("LB_input7").className += " hidden";
                document.getElementById("LB_input8").className += " hidden";
            }
        }
        else if(action.options[action.selectedIndex].value === "delete"){
            document.getElementById("input2").className += " hidden";
            document.getElementById("input3").className += " hidden";
            document.getElementById("input4").className += " hidden";
            document.getElementById("input5").className += " hidden";
            document.getElementById("input6").className += " hidden";
            document.getElementById("input7").className += " hidden";
            document.getElementById("input8").className += " hidden";

            document.getElementById("LB_input2").className += " hidden";
            document.getElementById("LB_input3").className += " hidden";
            document.getElementById("LB_input4").className += " hidden";
            document.getElementById("LB_input5").className += " hidden";
            document.getElementById("LB_input6").className += " hidden";
            document.getElementById("LB_input7").className += " hidden";
            document.getElementById("LB_input8").className += " hidden";
            if(table === "administrators")
            {
                document.getElementById("LB_input1").innerHTML = " Username: ";
            }
            else if(table === "romania_data")
            {
                document.getElementById("LB_input1").innerHTML = " Id student: ";
            }
            else if(table === "country_scores")
            {
                document.getElementById("LB_input1").innerHTML = " Country: ";
            }
        }
        else if(action.options[action.selectedIndex].value === "select"){
            document.getElementById("input1").className += " hidden";
            document.getElementById("input2").className += " hidden";
            document.getElementById("input3").className += " hidden";
            document.getElementById("input4").className += " hidden";
            document.getElementById("input5").className += " hidden";
            document.getElementById("input6").className += " hidden";
            document.getElementById("input7").className += " hidden";
            document.getElementById("input8").className += " hidden";

            document.getElementById("LB_input2").className += " hidden";
            document.getElementById("LB_input3").className += " hidden";
            document.getElementById("LB_input4").className += " hidden";
            document.getElementById("LB_input5").className += " hidden";
            document.getElementById("LB_input6").className += " hidden";
            document.getElementById("LB_input7").className += " hidden";
            document.getElementById("LB_input8").className += " hidden";


            document.getElementById("input9").classList.remove("hidden");
            document.getElementById("LB_input1").innerHTML = " Filter: ";
        }
        
    } );

    document.getElementById("table-name").addEventListener("change", function(){
        const event = new Event('change');
        document.getElementById("action-type").dispatchEvent(event);    
    } );

    document.getElementById("modify-table-data").addEventListener("click", function(){
        document.getElementsByClassName("modify-table")[0].classList.remove("hidden");
        document.getElementById("modify-table-data").classList.add("active");
        document.getElementById("select-table-data").classList.remove("active");
        document.getElementsByClassName("select-table")[0].classList.add("hidden");

    });

    document.getElementById("select-table-data").addEventListener("click", function(){
        document.getElementsByClassName("modify-table")[0].classList.add("hidden");
        document.getElementById("modify-table-data").classList.remove("active");
        document.getElementById("select-table-data").classList.add("active");
        let div=document.getElementsByClassName("select-table")[0];
        div.classList.remove("hidden");
    });

    document.getElementById("select-filters").addEventListener("change", function(){
        let table=document.getElementById("table-form").options[document.getElementById("table-form").selectedIndex].value;
        document.getElementById("select-data").className="hidden";
        document.getElementById("pages").className="hidden";
        document.getElementById("box_page").value=1;
        setLabels(table);
        if(table==="Administrators"){
            displayElements("hide",[2,3,4,5,6,7,8],[2,3,4,5,6,7,8]);
            displayElements("show",[1],[1]);
        }
        else if(table==="romania_data"){
            displayElements("show",[1,2,3,4,5,6,7,8],[1,2,3,4,5,6,7,8]);
        }
        else if(table==="country_scores"){
            displayElements("hide",[5,6,7,8],[5,6,7,8]);
            displayElements("show",[1,2,3,4],[1,2,3,4]);
        }
    });

    document.getElementById("table-form").addEventListener("change", function(){
        const event = new Event('change');
        clearInputs();
        document.getElementById("select-filters").dispatchEvent(event);
    } );

    document.getElementById("button_select").addEventListener("click", function(){
        selectRequest();
    } );

    document.getElementById("box_page").addEventListener("change", function(){
        if(document.getElementById("box_page").value>Math.floor(Object.keys(select_data).length/10)+1)
            document.getElementById("box_page").value=1;
        changeData();
    } );

}
