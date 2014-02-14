
        function load() {
            document.getElementById('jsShow').className+=" display";/*
            $('.parentReadMore').on('click', function(){
                if($(this).hasClass('open')){
                    $(this).removeClass('open');
                }
                else{
                    $(this).addClass('open');
                }
            });*/
            
        }
        window.onload = load;
        document.getElementById('readMore').onclick=function(){click(document.getElementById('parentReadMore'))};
        
        function click(object){
            var regExp = new RegExp('(?:^|\\s)open(?!\\S)', 'g');
            
            if(regExp.test(object.className)){
                object.className=object.className.replace( /(?:^|\s)open(?!\S)/g , '' );
            }
            else{
                object.className+=" open";
            }
            
        }
        
        //create style element