

   $( "#search" ).autocomplete({
   source: function(request, response){
     
           $.ajax({
           url:"{{route('search.tareas')}}",
            dataType: 'json',
           data:{
                  term: request.term
                 },
                 success: function(data) {
                 response(data)  
         }
 
     });
   }
 });
  