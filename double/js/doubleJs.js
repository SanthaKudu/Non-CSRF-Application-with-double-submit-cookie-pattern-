function getcookie(name)
{
   
    var results= (document.cookie).split('; ');
    //var a = results.indexOf("cookiename");
    for(var i=0;i < results.length;i++) 
    {
        var item= results[i];
        var cname=item.split('=')[0];
        var value=item.split('=')[1];

     if(cname===name)
     {
            document.getElementById("hidden").setAttribute('value',value);
            
            break;
      }
               



    }
   
    //'part1/part2'.split('/')[0]



            
    

}

getcookie('token');