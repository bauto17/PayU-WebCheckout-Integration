var t=0;
var compra={};
function addToCar(n,v,id) {
  var tabla =document.getElementById('tabla');
  var newRow = tabla.insertRow(1);
  newRow.innerHTML="<td>"+n+"</td><td>"+v+"</td>";
  t=t+v;
  document.getElementById('total').innerHTML=t;
  if(id in compra){
    compra[id]=compra[id]+1;
  }else{
    compra[id]=1;
  }
  console.log(compra);
  document.getElementById('items').value=(JSON.stringify(compra).replace(/"/g, '\\"'));
}
