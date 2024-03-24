(function () {
    var origOpen = XMLHttpRequest.prototype.open;
    XMLHttpRequest.prototype.open = function () {        
        console.warn = function () { };
        window['console']['warn'] = function () { }; // For confirmation again
        this.addEventListener('load', function () {                        
            console.warn('Something bad happened.');
            window['console']['warn'] = function () { };
        });        
    };
})();