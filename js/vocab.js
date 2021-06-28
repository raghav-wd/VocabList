
// for (var i = 0; i < countElement("item"); i++)
//     _all('.item')[i].addEventListener("click", function (event) {
//         // _('.overlay-writer').style.display = "inline-block";
//         _('.overlay-writer').style.transform = "translateX(100vw)";
//         _('.overlay-writer').style.height = "80vh";
//         _('.overlay-writer').style.boxShadow = "1px 2px 30px 4px grey";
//         _('#Word').value = this.getElementsByClassName('word')[0].innerHTML.trim();
//         _('#Elaboration').value = this.getElementsByClassName('elaboration')[0].innerHTML.trim();
//     // alert(this.getElementsByClassName('word')[0].innerHTML);
//     });

// _('.keyboard_arrow_down').addEventListener("click", function () {
//     _('.overlay-writer').style.transform = "translateX(-100vw)";
//     _('.overlay-writer').style.height = "0";
//     _('.overlay-writer').style.boxShadow = "0px 0px 0px 0px grey";
// })

// //finds the frequency of a class
// function countElement(search) {
//     var itemsList = _('.items-list').innerHTML;
//     var freq = 0;
//     for (var i = 0; i < itemsList.length; i++)
//     {
//         if (itemsList.charAt(i) == search.charAt(0))
//         {
//             var c = 0;
//             for (var j = 0; j < search.length; j++)
//             {
//                 if (itemsList.charAt(i+j) == search.charAt(j))
//                 c++;
//             }
//             if (c == search.length) freq++;
//         }
//     }
//     return freq;
// }

// function countElement(search) {
//     var itemsList = _('.items-list').innerHTML;
//     var freq = 0;
//     for (var i = 0; i < itemsList.length; i++) {
//         if (itemsList.charAt(i) == search.charAt(0)) {
//             var c = 0;
//             for (var j = 0; j < search.length; j++) {
//                 if (itemsList.charAt(i + j) == search.charAt(j))
//                     c++;
//             }
//             if (c == search.length) freq++;
//         }
//     }
//     return freq;
// }

// function _(ele) {
//     return document.querySelector(ele);
// }

// function _all(ele) {
//     return document.querySelectorAll(ele);
// }