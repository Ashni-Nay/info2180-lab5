//Insert JavaScript here 

function button(){

    var query1= document.getElementById("lookup");
    var query2= document.getElementById("city");
  
    query1.addEventListener("click", function(){     
  
            var input = document.getElementById("country").value;
  
                  $.ajax({
                        type:"GET", url: ("world.php?country=" + input), success:function(info){
                         $("#result").html(info);
                          }
             });
    });
  
  
    query2.addEventListener("click", function(){      
      var input = document.getElementById("country").value;
  
                $.ajax({
                      type:"GET",url:("world.php?country=") +input+ ("&context=cities"),success:function(info){
                         $("#result").html(info);
                      }
          });
    });
  
  }
  window.onload=button;