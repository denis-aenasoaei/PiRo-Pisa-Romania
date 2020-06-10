let method = 'POST';

window.onload = function () {
    document.getElementById("logout").addEventListener("click", function () {
        deleteCookies();
    });


    document.getElementById("action-type").addEventListener("change", function(){
        const action = document.getElementById("action-type");
        const table = document.getElementById("table-name").options[document.getElementById("table-name").selectedIndex].value;

        if(action.options[action.selectedIndex].value === "add" || action.options[action.selectedIndex].value === "update"){
            if(table === "Administrators")
            {
                document.getElementById("LB_input1").innerHTML = " Username: ";
                document.getElementById("LB_input2").innerHTML = " Password: ";
                document.getElementById("input2").type = "password";

                document.getElementById("input2").classList.remove("hidden");
                document.getElementById("LB_input2").classList.remove("hidden");

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
                
                document.getElementById("input2").classList.add("hidden");
                document.getElementById("LB_input2").classList.add("hidden");    
                
                document.getElementById("LB_input1").innerHTML = " Id student: ";
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
        else if(action.options[action.selectedIndex].value === "update"){


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
function deleteCookies(){
    document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "uuid=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    window.location.replace("Login.php");
}