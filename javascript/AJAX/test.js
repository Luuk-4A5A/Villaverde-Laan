function ajax(url) {
  let ajax = new XMLHttpRequest();
  ajax.open("GET", url, true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  let methods = {};


  methods.readyStateChange = (loadCallback) => {
    ajax.onreadystatechange = () => {
  		if(ajax.readyState == 4 && ajax.status == 200) {
  			loadCallback(ajax.responseText);
      }
  	}
  }

  methods.get = (loadCallback) => {
    methods.readyStateChange(loadCallback);
    ajax.send();
  };

  methods.post = (data) => {
    
  };

  return methods;

}


ajax('helloWorld.txt').get((responseText) => {
  console.log(responseText);
});


//
