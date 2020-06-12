let method = 'POST';

function deleteCookies(){
    document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "uuid=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    window.location.replace("Login.php");
}


function sendRequest(){
    const table = document.getElementById("table-name").options[document.getElementById("table-name").selectedIndex].value;
    let method = '';
    let value=document.getElementById("action-type").options[document.getElementById("action-type").selectedIndex].value;
    switch(value){
        case 'add':
            method='POST';
            break;
        case 'delete':
            method = 'POST'
            break;
        case 'update':
            method = 'POST'
            break;
        case 'select':
            method = 'POST'
            break;
    }

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

    console.log(queryString);
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if(this.status == 200)
            {
                //alert("SUCCESS!");
                console.log(xmlhttp.responseText);
                //console.log(JSON.parse(xmlhttp.responseText));
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


    document.getElementById("placeholder1").addEventListener("click", function(){
        document.getElementsByClassName("modify-table")[0].classList.add("hidden");
        document.getElementsByClassName("doElseElse")[0].classList.add("hidden");

        document.getElementsByClassName("doElse")[0].classList.remove("hidden");
        //to add the third one
    });

    document.getElementById("placeholder2").addEventListener("click", function(){
        document.getElementsByClassName("modify-table")[0].classList.add("hidden");
        document.getElementsByClassName("doElse")[0].classList.add("hidden");

        document.getElementsByClassName("doElseElse")[0].classList.remove("hidden");

    });

    document.getElementById("modify-table-data").addEventListener("click", function(){
        document.getElementsByClassName("modify-table")[0].classList.remove("hidden");

        document.getElementsByClassName("doElse")[0].classList.add("hidden");
        document.getElementsByClassName("doElseElse")[0].classList.add("hidden");


    });
    
    

}
