function wijzig(){

    let ok =true;

    if(document.getElementById("productnaamtoe").value === "")
    {
        document.getElementById("productongeldig").innerHTML = "geef een productnaam in";
        ok = false
    }
    else
    {
        document.getElementById("productongeldig").innerHTML = "";
    }


    if(isNaN(document.getElementById("prijstoe").value) || document.getElementById("prijstoe").value === "")
    {
        document.getElementById("prijsongeldig").innerHTML = "Alleen cijfers invullen.";
        ok=false;

    }
    else
    {
        document.getElementById("prijsongeldig").innerHTML = "";

    }

    if(isNaN(document.getElementById("productkortingtoe").value) || document.getElementById("productkortingtoe").value === "" )
    {
        document.getElementById("kortingongeldig").innerHTML = "Alleen cijfers invullen.";
        ok=false;

    }
    else
    {
        document.getElementById("kortingongeldig").innerHTML = "";

    }

    if(document.getElementById("merktoe").value === "" || document.getElementById("merktoe").value === "Select Merk" )
    {
        document.getElementById("merkongeldig").innerHTML = "geef een merk in aub";
        ok = false;
    }
    else
    {
        document.getElementById("merkongeldig").innerHTML = "";
    }

    if(document.getElementById("omschrijvingtoe").value === "")
    {
        document.getElementById("omschrijvingongeldig").innerHTML = "geef een omschrijving in";
        ok = false
    }
    else
    {
        document.getElementById("omschrijvingongeldig").innerHTML = "";
    }

    if(document.getElementById("genretoe").value === "" || document.getElementById("genretoe").value === "Select Genre")
    {
        document.getElementById("genreongeldig").innerHTML = "geef een genre in";
        ok = false;
    }
    else
    {
        document.getElementById("genreongeldig").innerHTML = "";
    }

    if(ok === true)
    {
        document.formtoevoegen.submit();
    }

}