<?php
echo "Hello World";
?>
<script>
  let a=1;
  var b=2;
  const c=3;

  function d(){
    let a1=1;
    var b1=2;
    const c1=3;
    a=4;
    b=5;
    //c=6;
    console.log(a,b,c);//4,5,3
    if(a1==1){
      var a2=1;
      let b2=2;
      const c2=2;
    }
    console.log(a2);
    //console.log(b2,c2);//not defined
  }
  d();
  console.log(a,b,c);//4,5,3
  //console.log(a1);//not defined
  //console.log(b1);//not defined
  //console.log(c1);//not defined

</script>