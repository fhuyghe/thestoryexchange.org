export default {
    init() {
        // JavaScript to be fired on the about us page
        function getSearchParameters() {
            var prmstr = window.location.search.substr(1);
            return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
        }
        
        function transformToAssocArray( prmstr ) {
            var params = {};
            var prmarr = prmstr.split("&");
            for ( var i = 0; i < prmarr.length; i++) {
                var tmparr = prmarr[i].split("=");
                params[tmparr[0]] = tmparr[1];
            }
            return params;
        }
    
        var params = getSearchParameters();
        if (params.category) {
            document.body.classList.add("filtered");
        }
        
        //Hide Featured Posts if filtered
        window.almFiltersActive = function(obj){
            if(obj){
                document.body.classList.add("filtered");
            } else {
                document.body.classList.remove("filtered");
            }
        }
    },
  };
