function sumAgain(startingNumber) {
  var initialNumber = startingNumber;


  return (number) => {
    initialNumber += number;
    return initialNumber;
  };

}

var get = sumAgain(3);
var result = get(5);

// console.log(result);


function getFamilyName(lastname) {


  return (firstname) => {
    return firstname + ' ' + lastname;
  }

}



//
// var showRockefeller = getFamilyName("Rockefeller");
//
// console.log(showRockefeller("John"));
// console.log(showRockefeller("David"));
//
// var showJackson = getFamilyName("Jackson");
//
// console.log(showJackson("Michael"));
// console.log(showJackson("Janet"));


//
// var array = [
//   {'attack' : 10, 'defence' : 20, 'name' : 'human'},
//   {'attack' : 10, 'defence' : 30, 'name' : 'dragon'},
// ];
//
// const values = array.filter((currentValue, index, arr) => {
//   return currentValue.attack > 9;
// });
//
//
// console.log(values[0].name);



function select(selector) {
  let selectObj = {};
  selectObj.elements = document.querySelectorAll(selector);
  selectObj.element = document.querySelector(selector);


  selectObj.setAttr = (attr, value) => {
    console.log(selectObj.elements.length);
    if(selectObj.elements.length <= 1){ selectObj.element.setAttribute(attr, value) } else {return 0;}
    return selectObj;
  };

  selectObj.setAttrs = (attr, value) => {
    if(selectObj.elements.length >= 1) {
      selectObj.elements.forEach((arrValue, index, array) => {
        selectObj.elements[index].setAttribute(attr, value);
      });
    }
    return selectObj;
  };

  selectObj.html = (content, element = selectObj.element) => {
    element.innerHTML = content;
    return selectObj;
  };

  selectObj.htmlAll = (content) => {
    selectObj.elements.forEach((value, index, arr) => {
      selectObj.html(content, value);
    });

    return selectObj;
  };

  selectObj.setMultipleAttrs = (options = {}) => {
    var entries = Object.entries(options);
    entries.forEach((value, index, arr) => {
        selectObj.setAttrs(value[0], value[1]);
    });
    return selectObj;
  }

  selectObj.setStyling = (options = {}) => {
    var entries = Object.entries(options);
    entries.forEach((value, index, arr) => {
      console.log(value[0]);
      selectObj.elements.forEach((eleValue) => {
        eleValue.style[value[0]] = value[1];
      });
    });
  };


  return selectObj;
}

var attributes = {
  'target'        : '_blank',
  'href'          : 'https://google.com',
  'title'         : 'murk'
};

console.log(select('a.setBlank').setMultipleAttrs(attributes).setStyling({'backgroundColor' : 'black', 'fontSize' : 30 + 'px'}));












//
