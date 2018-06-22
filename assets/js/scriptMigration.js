// ############################################################
// # UTILIAIRES                                               #
// ############################################################

// ------------------------------------------------------------
// | réinitialisation des résultats                           |
// ------------------------------------------------------------

/*jsonObject = {
    "title": "Outil migration",
    "description": "Simulez la migration spécifique de substances en fonction des conditions d’usage de l’emballage",
    "environmentsInContact": "Milieux en contact",
    "material": "matériau",
    "materialVolumicMass": "Masse volumique du matériau",
    "alimentVolumicMass": "Masse volumique de l'aliment",
    "geometricalCharacteristics": "Caractéristiques géométriques",
    "thickness": "épaisseur",
    "contactSurface": "Surface de contact",
    "alimentVolume": "Volume de l'aliment",
    "migrantCharacteristics": "Caractéristiques du migrant",
    "concentration": "Concentration",
    "molarMass": "Masse molaire",
    "partitionCoefficient": "Coefficient de partage",
    "contactConditions": "Conditions de contact",
    "contactTemperature": "Température de contact",
    "contactTime": "Temps de contact",
    "results": {
    "title": "Résultats",
        "migrationAtEquilibrium": "Migration à l'équilibre",
        "distributionCoefficient": "Coefficient de diffusion",
        "migrationRate": "Taux de migration",
        "migration": "Migration",
        "migrationUnit": "Parties par million (ppm)"
},
    "disclaimer": {
    "problem": "Attention",
        "problemText": "Les éléments indiqués ci-dessus ne constituent pas un avis technique ou juridique. Le CTCPA ne garantit aucunement les conséquences quelles qu’elles soient, notamment commerciales, de l’utilisation qui pourrait être faite des résultats fournis, cette exploitation restant sous la seule responsabilité du client.",
        "solution": "Nos prestations",
        "solutionText": "Pour les multicouches, les matériaux et les conditions de contact non standards, nos experts utilisent des outils de calcul plus évolués ou recommandent des mesures expérimentales. Pour faire appel à nos services, nous vous invitons à spécifier votre demande en cliquant sur le bouton ci-dessous.",
        "access": "ACCÉDER"
}
};*/

var jsonData = {
    "materials_migration": [
        {
            "id": "5",
            "name": "HDPE",
            "temperature_max": "90",
            "barrier_effect": "14.5",
            "temperature_effect": "1577"
        },
        {
            "id": "6",
            "name": "LDPE",
            "temperature_max": "80",
            "barrier_effect": "11.5",
            "temperature_effect": "0"
        },
        {
            "id": "7",
            "name": "LLDPE",
            "temperature_max": "100",
            "barrier_effect": "11.5",
            "temperature_effect": "0"
        },
        {
            "id": "8",
            "name": "PA 12",
            "temperature_max": "100",
            "barrier_effect": "0",
            "temperature_effect": "0"
        },
        {
            "id": "9",
            "name": "PA 6,6",
            "temperature_max": "100",
            "barrier_effect": "2.6",
            "temperature_effect": "0"
        },
        {
            "id": "10",
            "name": "PA6",
            "temperature_max": "100",
            "barrier_effect": "2.6",
            "temperature_effect": "0"
        },
        {
            "id": "11",
            "name": "PET (T < 70°)",
            "temperature_max": "1",
            "barrier_effect": "3.1",
            "temperature_effect": "1577"
        },
        {
            "id": "12",
            "name": "PET (T > 70°)",
            "temperature_max": "175",
            "barrier_effect": "6.4",
            "temperature_effect": "1577"
        },
        {
            "id": "13",
            "name": "PP (homo)",
            "temperature_max": "120",
            "barrier_effect": "13.1",
            "temperature_effect": "1577"
        },
        {
            "id": "14",
            "name": "PP (random)",
            "temperature_max": "136",
            "barrier_effect": "13.1",
            "temperature_effect": "1577"
        },
        {
            "id": "15",
            "name": "PS",
            "temperature_max": "70",
            "barrier_effect": "-1",
            "temperature_effect": "0"
        },
        {
            "id": "16",
            "name": "PVC (rigid)",
            "temperature_max": "70",
            "barrier_effect": "-1",
            "temperature_effect": "0"
        }
    ]
}


//console.log(JSON.parse(json));

function resetResults() {
    console.log("a");
    document.getElementById('migrationAtEquilibrium').textContent = '....';
    document.getElementById('distributionCoefficient').textContent = '....';
    document.getElementById('migrationRate').textContent = '....';
    document.getElementById('result').textContent = '....';
}

// ############################################################
// # CALCUL DE LA MIGRATION                                   #
// ############################################################

// ------------------------------------------------------------
// | calcul du volume de l'emballage                          |
// ------------------------------------------------------------
function packagingDimensions(packaging) {
    return packaging.volumicMass * packaging.thickness * packaging.surface;
}
// ------------------------------------------------------------
// | calcul de la migration à l'équilibre                     |
// ------------------------------------------------------------
function setMigrationAtEquilibrium(packaging, migrant, food) {
    return (migrant.concentration * packagingDimensions(packaging)) /
        ((food.volumicMass * food.volume) + packagingDimensions(packaging) * migrant.partitionCoefficient);
}
// ------------------------------------------------------------
// | calcul du taux de migration                              |
// ------------------------------------------------------------
function setMigrationRate(packaging, diffusion, distributionCoefficient, time) {
    return 0.6 < ((2 / packaging.thickness) * diffusion) ?
        1 - (
            (8 / Math.pow(3.14116,2) * Math.exp(-Math.pow(3.14113, 2) * (
                    distributionCoefficient * (
                        time / (4 * Math.pow(packaging.thickness, 2))
                    )
                ))
            )) :
        (2 / packaging.thickness) * diffusion;
}
// ------------------------------------------------------------
// | calcul du coefficient de partage du migrant              |
// ------------------------------------------------------------
function setDistributionCoefficient(cumulativeEffect, migrant, temperature) {
    return 10000 * Math.exp(
        cumulativeEffect +
        (0.003 * migrant.molarMass) -
        (0.1351 * Math.pow(migrant.molarMass, 2 / 3)) -
        (10454 / temperature)
    );
}
// ------------------------------------------------------------
// | calcul de la migration et mise à jour de la page         |
// ------------------------------------------------------------
function computeMigration(packaging, food, migrant, temperature, time) {
    var distributionCoefficient = setDistributionCoefficient(
        packaging.barrier_effect - (packaging.temperature_effect / temperature),
        migrant,
        temperature
        ),
        diffusion = Math.pow(
            distributionCoefficient * (time / 3.14116),
            0.5
        ),
        migrationRate = setMigrationRate(
            packaging,
            diffusion,
            distributionCoefficient,
            time
        ),
        migrationAtEquilibrium = setMigrationAtEquilibrium(
            packaging,
            migrant,
            food
        ),
        migration = migrationRate * migrationAtEquilibrium;
    document.getElementById('migrationAtEquilibrium').textContent = migrationAtEquilibrium.toExponential(2);
    document.getElementById('distributionCoefficient').textContent = distributionCoefficient.toExponential(2);
    document.getElementById('migrationRate').textContent = migrationRate.toExponential(2);
    document.getElementById('result').textContent = migration.toExponential(2);
}

// ############################################################
// # CREATION D'ELEMENT                                       #
// ############################################################

// ------------------------------------------------------------
// | création de l'objet embllage                             |
// ------------------------------------------------------------
window.onchange = function (){
    var material = document.getElementsByName(document.getElementById('materialName').value)[0];
    var test = document.getElementById('PackagingVolumicMass').value;
    test.replace(',','.');
    return {
        volumicMass: parseFloat(
            document.getElementById('PackagingVolumicMass').value.replace(',', '.')
        ),
        surface: parseFloat(
            document.getElementById('contactSurface').value.replace(',', '.')
        ),
        thickness: parseFloat(
            document.getElementById('packagingThickness').value.replace(',', '.')
        ) * 0.0001,
        temperature_effect: getTemperatureEffect(jsonData)
        ,
        barrier_effect: getBarriereEffect(jsonData)
    };
}

function createAndInitializePackagingObject() {
    var material = document.getElementsByName(document.getElementById('materialName').value)[0];
    var test = document.getElementById('PackagingVolumicMass').value;
    test.replace(',','.');
    return {
        volumicMass: parseFloat(
            document.getElementById('PackagingVolumicMass').value.replace(',', '.')
        ),
        surface: parseFloat(
            document.getElementById('contactSurface').value.replace(',', '.')
        ),
        thickness: parseFloat(
            document.getElementById('packagingThickness').value.replace(',', '.')
        ) * 0.0001,
        temperature_effect: getTemperatureEffect(jsonData)
        ,
        barrier_effect: getBarriereEffect(jsonData)
    };
}

// ------------------------------------------------------------
// | création de l'objet aliment                              |
// ------------------------------------------------------------
function createAndInitializeFoodObject() {
    return {
        volumicMass: parseFloat(
            (document.getElementById('foodVolumicMass').value).replace(',', '.')
        ),
        volume: parseFloat(
            (document.getElementById('foodVolume').value).replace(',', '.')
        ),
    };
}
// ------------------------------------------------------------
// | création de l'objet migrant                              |
// ------------------------------------------------------------
function createAndInitializeMigrantObject() {
    return {
        concentration: parseFloat(
            (document.getElementById('migrantConcentration').value).replace(',', '.')
        ),
        partitionCoefficient: parseFloat(
            (document.getElementById('partitionCoefficient').value).replace(',', '.')
        ),
        molarMass: parseFloat(
            (document.getElementById('migrantMolarMass').value).replace(',', '.')
        )
    };
}

// ############################################################
// # VALIDATION DU FORMULAIRE                                 #
// ############################################################

// ------------------------------------------------------------
// | validation des champs 'input'                            |
// ------------------------------------------------------------
function inputsAreValid() {
    return document.querySelectorAll('input:valid').length == document.querySelectorAll('input').length;
}
// ------------------------------------------------------------
// | validation de la liste des matériaux                     |
// ------------------------------------------------------------
function checkLayersList() {
    var layers = document.getElementsByClassName('layer'),
        layersCount = layers.length,
        i;
    for (i = 0; i < layersCount; i++) {
        if (!layers[i].querySelector('select').value)
            return false;
    }
    return true;
}

// ############################################################
// # POINTS D'ENTREE                                          #
// ############################################################

// ------------------------------------------------------------
// | mise à jour des résultats                                |
// ------------------------------------------------------------
function updateResults() {

    //if (inputsAreValid() && checkLayersList()) {
    var packaging = createAndInitializePackagingObject(),
        food = createAndInitializeFoodObject(),
        migrant = createAndInitializeMigrantObject();
    console.log(packaging);
    console.log(migrant);
    console.log(food);
    computeMigration(
        packaging,
        food,
        migrant,
        parseFloat(
            (document.getElementById('temperature').value).replace(',', '.')
        ) + 273,
        parseFloat(
            (document.getElementById('time').value).replace(',', '.')
        ) * 3600
    );
    //}
    //else
    //	resetResults();
}

function loadJSON(callback) {

    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', 'migrationTool.json', true); // Replace 'my_data' with the path to your file
    xobj.onreadystatechange = function () {
        if (xobj.readyState == 4 && xobj.status == "200") {
            // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
            callback(xobj.responseText);
        }
    };
    xobj.send(null);
}

loadJSON(function(response) {
    console.log("a");
    // Do Something with the response e.g.
    jsonresponse = JSON.parse(response);
    var child;
    // Assuming json data is wrapped in square brackets as Drew suggests
    jsonresponse.materials_migration.forEach(function (value) {
        child = document.createElement("option");
        child.innerHTML = value.name;
        child.value = value.id;
        document.getElementById('materialName').appendChild(child);
    })


});

console.log(document.getElementById('materialName'));

for(i =0; i < document.getElementsByClassName("d-none")[0].children.length;i++){
    child = document.createElement("option");
    child.value = i;
    child.innerHTML = document.getElementById('nameMaterial'+i).innerHTML;
    document.getElementById('materialName').appendChild(child);
}

function getTemperatureEffect(JsonObject) {
    var data;
    var e = document.getElementById('materialName');
    var id = e.value;
    //document.getElementById('tempEffectMaterial'+id).innerText);
    return parseFloat(document.getElementById('tempEffectMaterial'+id).innerText.replace(',', '.'));
}

function getBarriereEffect(JsonObject) {
    var data;
    var e = document.getElementById('materialName');
    var id = e.value;

    return parseFloat(document.getElementById('barrierEffectMaterial'+id).innerText.replace(',','.'));
}

document.getElementsByClassName("calcul")[0].onclick = function (event) {
    event.preventDefault();

    var packaging = createAndInitializePackagingObject(),
        food = createAndInitializeFoodObject(),
        migrant = createAndInitializeMigrantObject();
    console.log(packaging);
    console.log(migrant);
    console.log(food);
    computeMigration(
        packaging,
        food,
        migrant,
        parseFloat(
            (document.getElementById('temperature').value).replace(',', '.')
        ) + 273,
        parseFloat(
            (document.getElementById('time').value).replace(',', '.')
        ) * 3600
    );
};

/*window.onchange = function(){
    var e = document.getElementById('materialName');
    var strUser = e.value;
    console.log(strUser);
}*/

/*function appendHTML() {
    console.log("a");
	document.body.innerHTML="" +
		"<div id='resultatsCalculs'>"+
    	"<div id='migration equilibre'>"+
        "0"+
        "</div>"+
        "<div id='coef diffusion'>"+
        "0"+
        "</div>"+
        "<div id='taux migration'>"+
        "0"+
        "</div>"+
        "<div id='resultat'>"+
        "0"+
        "</div>"+
        "</div>"+
    "<form class=col-lg-6 oninput='updateResults(this.value)'>"+
        "<div class=row>"+
        "<fieldset class='col-lg-6 col-md-6' aria-labelledby=legendEnvironments role=group>"+
        "<legend id='legendEnvironments'>"+
        "json['environmentsInContact']"+
        "</legend>"+
        "<div class='input-group layer'>"+
        "<select id='materialName' class=form-control required>"+
    "<option value= json['material'] </option>"+
        "<option value=json['name']</option>';"+
        "</select>"+
        "</div>"+
        "<br>"+
        "<div class=input-group>"+
        "<input type=number pattern=[0-9]+([\.,][0-9]+)? oninput="+updateResults(this.value)+" step=0.01 id='packagingVolumicMass' class=form-control required min=0 max=2 placeholder="+jsonObject['materialVolumicMass']+" aria-describedby=unityPackagingVolumicMass>"+
    "<span class=input-group-addon id='unityPackagingVolumicMass'>gr/cm<sup>2</sup></span>"+
    "</div>"+
    "<br>"+
    "<div class=input-group>"+
        "<input type=number pattern=[0-9]+([\.,][0-9]+)? step=0.01 id='foodVolumicMass' class=form-control required min=0 max=2 placeholder="+jsonObject['alimentVolumicMass'] +" aria-describedby=unityFoodVolumicMass>"+
        "<span class=input-group-addon id='unityFoodVolumicMass'>gr/cm<sup>2</sup></span>"+
    "</div>"+
    "</fieldset>"+
    "<fieldset class='col-lg-6 col-md-6' aria-labelledby=legendGeometricalCharacteristics role=group>"+
        "<legend id='legendGeometricalCharacteristics'>"+
        "jsonObject['geometricalCharacteristics']"+
        "</legend>"+
        "<div class=input-group>"+
        "<input type=number pattern=[0-9]+([\.,][0-9]+)? step=0.01 id='packagingThickness' class=form-control required min=0 max=5000 placeholder="+ jsonObject['thickness']+" aria-describedby=unityPackagingThickness>"+
        "<span class=input-group-addon id='unityPackagingThickness'>µm</span>"+
        "</div>"+
        "<br>"+
        "<div class=input-group>"+
        "<input type=number pattern=[0-9]+([\.,][0-9]+)? step=0.01 id='contactSurface' class=form-control required min=0 max=100000 placeholder="+ jsonObject['contactSurface']+" aria-describedby=unityContactSurface>"+
        "<span class=input-group-addon id='unityContactSurface'>cm<sup>2</sup></span>"+
    "</div>"+
    "<br>"+
    "<div class=input-group>"+
        "<input type=number pattern=[0-9]+([\.,][0-9]+)? step=0.01 id='foodVolume' class=form-control required min=0 max=2000000 placeholder="+jsonObject['alimentVolume']+" aria-describedby=unityFoodVolume>"+
        "<span class=input-group-addon id='unityFoodVolume'>cm<sup>3</sup></span>"+
    "</div>"+
    "</fieldset>"+
    "</div>"+
    "<div class=row>"+
        "<fieldset class='col-lg-6 col-md-6' aria-labelledby=legendMigrantCharacteristics role=group>"+
        "<legend id='legendMigrantCharacteristics'>"+
        jsonObject['migrantCharacteristics']+
        "</legend>"+
        "<div class=input-group>"+
        "<input type=number pattern=[0-9]+([\.,][0-9]+)? step=0.01 id='migrantConcentration' class=form-control required min=0 max=600000 placeholder="+jsonObject['concentration']+"  aria-describedby=unityMigrantConcentration>"+
        "<span class=input-group-addon id='unityMigrantConcentration'>ppm</span>"+
        "</div>"+
        "<br>"+
        "<div class=input-group>"+
        "<input type=number pattern=[0-9]+([\.,][0-9]+)? step=0.01 id='' class=form-control required min=0 max=10000 placeholder="+jsonObject['molarMass']+"  aria-describedby=unityMigrantMolarMass>"+
        "<span class=input-group-addon id='unityMigrantMolarMass'>gr/mole</span>"+
        "</div>"+
        "<br>"+
        "<div id=nospan class=input-group>"+
        "<input type=number pattern=[0-9]+([\.,][0-9]+)? step=0.01 id='partitionCoefficient' class=form-control required min=0 max=100000 placeholder="+jsonObject['partitionCoefficient']+">"+
        "</div>"+
        "</fieldset>"+
        "<fieldset class='col-lg-6 col-md-6' aria-labelledby=legendConditions role=group>"+
        "<legend id=legendConditions>"+
        "jsonObject['contactConditions']"+
        "</legend>"+
        "<div class=input-group>"+
        "<input type=number pattern=[0-9]+([\.,][0-9]+)? step=0.01 id='temperature' class=form-control required min=-273 placeholder="+jsonObject['contactTemperature']+" aria-describedby=unityTemperature>"+
        "<span class=input-group-addon id='unityTemperature'>°C</span>"+
    "</div>"+
    "<br>"+
    "<div class=input-group>"+
        "<input type=number pattern=[0-9]+([\.,][0-9]+)? step=0.01 id='time' class=form-control required min=0 max=87600 placeholder="+jsonObject['contactTime']+" aria-describedby=unityTime>"+
        "<span class=input-group-addon id='unityTime'>h</span>"+
        "</div>"+
        "</fieldset>"+
        "</div>"+
        "</form>";
}

appendHTML();*/