class Queue {
    constructor() {
        this.queue = [];
    }

    add (domain) {
        this.queue.push(domain);
    }
    process () {
        let self = this;
        let domain  = this.queue[0];
        if(!domain) return;
        $.ajax({
                url: "/availability.php",
                datatype : "json",
                method : "get",
                data: { domain }
        }).done(function(data) {        
            self.displayDomain(data,domain);
            self.queue.shift();
            self.process();
        });            
    }
    domainDone(doneFunction) {
        this.domainDoneFunction = doneFunction;
    }
    domainFailed(failedFunction) {
        this.domainFailedFunction = failedFunction;
    }
    displayDomain(data,domain) {
        ascioAvailabilityProgress.done();
        if(data.code == 200 || data.code == 203) {
            let symbol = data.code == 203 ? '<span class="glyphicon glyphicon-euro"> </span>' : '';
            $("#availabilityResult").append('<div id="domain-'+domain+'" class="domain-result">'+symbol+domain+'</div>'); 
            if(this.domainDoneFunction) {
                this.domainDoneFunction(domain,$("#domain-"+domain));
            }
        }
         else {
            if(this.domainFailedFunction) {
                this.domainFailedFunction(domain);
            }
        }
    }
}
class Queues {
    constructor () {
        this.tlds = {};
    }
    add(names,tlds) {
        tlds.forEach(tld => {
            names.forEach(name => {
                if(!this.tlds[tld]) {
                    this.tlds[tld] = new Queue();
                }
                this.tlds[tld].add(name+"."+tld);
            })
        })
    }
    process() {
        $("#search-domain").attr("disabled", "disabled");
        $("#availabilityResult").html("");
        let tlds = Object.keys(this.tlds);
        let self = this;
        tlds.forEach(tldName => {
            window.setTimeout(function () {
                let tld = self.tlds[tldName];
                tld.process();
            },1)
        }); 
    }
    domainDone(doneFunction) {
        this.domainDoneFunction = doneFunction;
    }
    domainFailed(failedFunction) {
        this.domainFailedFunction = failedFunction;
    }
}
class Progress {
    constructor(names,tlds) {
        this.total = names.length * tlds.length;
        this.multiplier = 100 / this.total;
        this.domainsDone = 0;
        $("#availability-progress").css("width","0%");
    }
    done() {
        this.domainsDone = this.domainsDone + 1;
        let width = this.domainsDone * this.multiplier;
        $("#availability-progress").css("width",width+"%");        
        if(this.domainsDone == this.total){
            $("#search-domain").removeAttr("disabled");
        }
    }
}
var ascioAvailabilityProgress;

jQuery(document).ready(function(){
    $("#search-domain").click(() => {
        var tlds = {};
        var namesInput = $("#names-input").val().split(/, ?/) ;
        var names = [];        
        namesInput.forEach(nameInput=> {
            let name = nameInput.split("\.")[0];
            let tld =  nameInput.replace(name+".","");
            names.push(name);
            if(tld!==name) {
                tlds[tld] = true; 
            }
        });
        $.each($("input[name='tld']:checked"), function(){            
            tlds[($(this).val())] = true;
        });
        var queues = new Queues();
        queues.domainDone((domain, domainElement) => {
            domainElement.css("border","1px solid red");
        })
        queues.add(names,Object.keys(tlds));
        ascioAvailabilityProgress = new Progress(names,Object.keys(tlds));
        queues.process();
    })

})
