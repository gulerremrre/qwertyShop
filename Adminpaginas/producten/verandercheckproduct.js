function wijzig() {
    let ok = true;

    if (document.getElementById("productid").value === "") {
        document.getElementById("productongeldig").innerHTML = "Geef een productnaam in.";
        ok = false;
    } else {
        document.getElementById("productongeldig").innerHTML = "";
    }

    if (document.getElementById("productnaam").value === "") {
        document.getElementById("productnaamongeldig").innerHTML = "Geef een productnaam in.";
        ok = false;
    } else {
        document.getElementById("productnaamongeldig").innerHTML = "";
    }

    if (isNaN(document.getElementById("productkorting").value) || document.getElementById("productkorting").value === "") {
        document.getElementById("kortingongeldig").innerHTML = "Alleen cijfers invullen.";
        ok = false;
    } else {
        document.getElementById("kortingongeldig").innerHTML = "";
    }

    if (document.getElementById("merk").value === "") {
        document.getElementById("merkongeldig").innerHTML = "Geef een merk in.";
        ok = false;
    } else {
        document.getElementById("merkongeldig").innerHTML = "";
    }

    if (document.getElementById("Omschrijving").value === "") {
        document.getElementById("omschrijvingongeldig").innerHTML = "Geef een omschrijving in.";
        ok = false;
    } else {
        document.getElementById("omschrijvingongeldig").innerHTML = "";
    }

    if (document.getElementById("Genre").value === "") {
        document.getElementById("genreongeldig").innerHTML = "Geef een genre in.";
        ok = false;
    } else {
        document.getElementById("genreongeldig").innerHTML = "";
    }

    if (ok === true) {
        document.formtoevoegen.submit();
    }
}