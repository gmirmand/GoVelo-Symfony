var home = {
    container: $('.page-home'), /*<- tu peux définir des selecteur*/
    val: 'Coucou', /*<- ou des variables*/
    init: function () {
        console.log('Home init');
        home.test();
    },
    test: function () {
        home.container.append(home.val);
        /* et utiliser les variables en haut comme ça */
    }
};
