window.onload = function () {
    document.getElementById("logout").addEventListener("click", function () {
        deleteCookies();
    });
}
function deleteCookies(){
    document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "uuid=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    window.location.replace("Login.php");
}