/* 
 * (class)Progress<nowValue, minValue, maxValue>
 */
//helper function-> return <DOMelement>
function elt(type, prop, ...childrens) {
  let elem = document.createElement(type);
  if (prop) Object.assign(elem, prop);
  for (let child of childrens) {
    if (typeof child == "string") elem.appendChild(document.createTextNode(child));
    else elem.appendChild(elem);
  }
  return elem;
}

//Progress class
class Progress {
  constructor(now, min, max, options) {
    this.dom = elt("div", {
      className: "progress-bar"
    });
    this.min = min;
    this.max = max;
    this.intervalCode = 0;
    this.now = now;
    this.syncState();
    if(options.parent){
      document.querySelector(options.parent).appendChild(this.dom);
    } 
    else document.body.appendChild(this.dom)
  }
  
  getNow(){
	  return this.now;
  }
  
  setNow(now){
	  this.now=now;
  }

  syncState() {
    this.dom.style.width = this.now + "%";
  }

  startTo(step, time) {
    if (this.intervalCode !== 0) return;
    this.intervalCode = setInterval(() => {
      if (this.now + step > this.max) {
        this.now = this.max;
        this.syncState();
        clearInterval(this.interval);
        this.intervalCode = 0;
        return;
      }
      this.now += step;
      this.syncState()
    }, time)
  }
  end() {
	this.now=this.max;
    clearInterval(this.intervalCode);
    this.intervalCode = 0;
    this.syncState();
  }
}

let pb = new Progress(0, 0, 100, {parent : ".progress"});

function verify(){
	//arg1 -> step length
	//arg2 -> time(ms)
	pb.startTo(5, 500);
	//end to progress after 5s

	setTimeout( () => {
		pb.end()
		setTimeout( () => {
			checkStatus()
		}, 500)
	}, 5000)
}

function isFinished(){
	if(pb.getNow()===0) verify();
	else {
		pb.setNow(0);
		verify();
	}
}

function checkStatus(){
	//num = Math.floor(Math.random() * 2);
    num = 1;
	if(num == 1) // se l'elmetto è indossato correttamente
    {
		var div = document.getElementById('messageBox');
		document.getElementById("next").disabled = false;
		document.getElementById("verify").disabled = true;
		div.innerHTML += '</br><h2 class="display-8 text-white text-center">Wonderful, your helmet is correctly positioned. Click next to proceed.</h1>';
		//alert('Helmet worn correctly. Press OK to go ahead.');
        //window.location = 'graph.html';
    }
    else alert('Helmet worn incorrectly. Watch our tutorial and try again.');
}