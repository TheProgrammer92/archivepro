
export default function insertTableau() {

    let app = this;
    //verification du nom

    if (app.name && !(app.name==="")){
        app.element.name=app.name;
    }


    if (app.prenom && !(app.prenom ==="")){
        app.element.prenom=app.prenom;
    }




    if (app.telephone && !(app.telephone ==="")) {
        app.element.telephone = app.telephone
    }




    if (app.sexe && !(app.sexe ==="")){

        app.element.sexe= app.sexe;
    }




    if (app.email && !(app.email ==="")){

        app.element.email= app.email;
    }
}
