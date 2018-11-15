function populate(){
    if(quiz.isEnded()){
         showScores();
    }else{
        //show question
        var element = document.getElementById("question");
        element.innerHTML = quiz.getQuestionIndex().text;
        //show choice
        var choices = quiz.getQuestionIndex().choices;
        for(var i = 0; i < choices.length; i++){
            var element = document.getElementById("choice" + i);
            element.innerHTML = choices[i];
            guess("btn" + i, choices[i]);
        }
        showProgress();
    }
};

function showProgress(){
    var currentQuestionNumber = quiz.questionIndex + 1;
    var element = document.getElementById("progress");
    element.innerHTML = "Pregunta " + currentQuestionNumber + " de " + quiz.questions.length;
};

function showScores(){
    var gameOver = "<h1>Resultados</h1>";
    gameOver += "<h2 id='score'>Tu puntaje es de: " +quiz.score+"</h2>";
    var element = document.getElementById("quiz");
    element.innerHTML = gameOver;
};

function guess(id, guess){
    var button = document.getElementById(id);
    button.onclick = function(){
        quiz.guess(guess);
        populate();
    }
};



var questions = [
    new Question("Es un metabolito intermediario entre las rutas de degradación de DDT y degradación de tolueno.",["Ácido ascórbico","Ácido benzoico"," Alcohol bencílico"], "Ácido benzoico"),
    new Question("COMODÍN: El proceso de Metanogénesis se puede llevar a cabo únicamente si existen condiciones anaerobias.",["Verdadero","Falso","No lo sé "], "Verdadero"),
    new Question("Compuesto acumulado en tejidos grasos de especies animales debido a su difícil metabolización.",["Glucosa","Piruvato","DDT"], "DDT"),
    new Question("La obtención biológica de metano puede realizarse a partir de la fijación de CO2 utilizando al _____________ como donador de electrones.",["Hidrógeno","Azufre"," Nitrógeno"], "Hidrógeno"),
    new Question("COMODÍN: El Ciclo de Krebs no se puede llevar a cabo bajo condiciones de anaerobiosis.",["Falso","No lo sé", "Verdadero"], "Verdadero"),
    new Question("Es un metabolito intermediario en todas las rutas de degradación de compuestos aromáticos cuya apertura puede realizarse en posición orto o meta.",["Catecol","Tolueno","Piruvato"], "Catecol"),
    new Question("El ácido cítrico se forma de la reacción entre la acetil-conezima a y el_____________.",["Fumarato","Oxalacetato","Carboxilato"], "Oxalacetato"),
    new Question("COMODÍN: El piruvato es un metabolito intermediario entre la glucólisis y el ciclo de Krebs.",["Falso","Verdadero", "No lo sé"], "Verdadero"),
    new Question("La enzima fosfofructoquinasa actúa sobre el metabolito siguiente:",["Fructosa 6 fosfato","Fructosa","Fructosa 1,6 bifosfato"], "Fructosa 6 fosfato"),
    new Question("COMODÍN: Los efluentes gaseosos contaminados se pueden tratar a través de biopilas.",["No lo sé","Verdadero", "Falso"], "Verdadero"),
    new Question("Es un metabolito que se encuentra en la ruta de degradación de DDT y que normalmente suele ser más tóxico para los organismos vivos que el propio DDT.",["DDE","EDTA","Hidroximuconato"], "DDE"),
    new Question("Un mal olor en los tanques de aireación de las plantas de tratamiento de agua puede ser causado por la existencia de condiciones de anaerobiosis, por lo que esta ruta metabólica NO se está llevando a cabo:",["Ciclo de Krebs","Metanogénesis","Acetogénesis"], "Ciclo de Krebs"),
    new Question("COMODÍN: El DDT es un insecticida empleado en la década de los 60’s causante de la llamada “Primavera Majestuosa”, fenómeno que causaría su prohibición en 1972.",["Verdaero","Falso", "No lo sé"], "Falso"),
    new Question("Proceso de síntesis de macromoléculas a partir de moléculas simples:",["Catabolismo","Anabolismo", "Reacción"], "Catabolismo"),
    new Question("Consiste en la obtención de macromoléculas a partir de moléculas simples.",["Catabolismo"," Coenzima(s)", "Anabolismo"], "Catabolismo"),
    new Question("COMODÍN: De la glucólisis se obtienen 6 moléculas de ATP y 1 molécula de piruvato.",["No lo sé","Falso", "Verdadero"], "Falso"),
    new Question("Las rutas metabólicas son un conjunto de ____________________ biológicas sucesivas que transforman un metabolito en uno o varios productos y subproductos.",["Cofactores","Reacciones", "Enzimas"], "Reacciones"),
    new Question("Las ________________ son proteínas que funcionan como catalizadores biológicos las cuales actúan sobre procesos o sustratos específicos. ",["Enzimas","Coenzimas", "Reacciones"], "Enzimas"),
    new Question("COMODÍN: El Ciclo de Krebs se lleva a cabo en la mitocondria de las células eucariotas mientras que la glucólisis se lleva a cabo en el citoplasma.",["Verdadero","No lo sé", "Falso"], "Verdadero"),
    new Question("Las ________________ son moléculas orgánicas pequeñas que se unen a los sustratos y los convierten en sus formas activas.",["Coenzimas","Reacciones", "Enzimas"], "Coenzimas"),
    new Question("Gran cantidad de enzimas requieren de unirse a ____________ inorgánicos que las transforman a su forma activa para que puedan llevar a cabo su función.",["Intermediarios","Cofactores", "Pares ordenados"], "Cofactores"),
    new Question("COMODÍN: El Ciclo de Calvin es también conocido como el ciclo de los ácidos tricarboxílicos y tiene por objetivo la oxidación piruvato y otros compuestos hasta obtener CO2.",["Verdadero","No lo sé", "Falso"], "Falso"),
    new Question("El _________________ es el conjunto de cambios químicos y biológicos que llevan a cabo los organismos vivos con el objetivo de obtener energía", ["Intermediario(s)","Anabolismo", "Metabolismo"], "Metabolismo"),
    new Question("Se considera a un metabolito como ________________ cuando este interviene en varias rutas metabólicas o sirve cómo conector ente estas.",["Enzima","Inhibidor", "Intermediario"], "Intermediario")
    //new Question("",["","", ""], ""),
];

var quiz = new Quiz(questions);

populate();