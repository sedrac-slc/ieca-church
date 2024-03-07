import{o as u,c as l,a as n,n as o,t as s,i as m,F as p,g as i}from"./app-tf5-tRa8.js";const c=["for"],y={key:0,class:"text-pink-600"},g=["type","name","id","placeholder","required","value"],d={__name:"Input",props:{name:{type:String,required:!0},icon:{type:String,required:!0},text:{type:String,required:!0},value:{type:String,default(){return""}},type:{type:String,default(){return"text"}},placeholder:{type:String,default(){return""}},required:{type:Boolean,default(){return!1}}},emits:["update"],setup(e){return(a,t)=>(u(),l(p,null,[n("label",{for:e.name,class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},[n("i",{class:o(e.icon+" text-pink-500")},null,2),n("span",null,s(e.text),1),e.required?(u(),l("span",y,"*")):m("",!0)],8,c),n("input",{type:e.type,name:e.name,id:e.name,placeholder:e.placeholder,required:e.required,value:e.value,onInput:t[0]||(t[0]=r=>a.$emit("update",r.target.value)),class:"bg-gray-50 border border-pink-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"},null,40,g)],64))}},x={__name:"InputEmail",props:{value:{type:String,default(){return""}},name:{type:String,default(){return"email"}},placeholder:{type:String,default(){return""}},required:{type:Boolean,default(){return!1}},text:{type:String,default(){return"Digita o seu email"}},icon:{type:String,default(){return"bx bx-at bx-tada text-pink-500"}}},emits:["update"],setup(e){return(a,t)=>(u(),i(d,{type:"email",name:e.name,text:e.text,icon:e.icon,required:e.required,value:e.value,onUpdate:t[0]||(t[0]=r=>a.$emit("update",r))},null,8,["name","text","icon","required","value"]))}},k={__name:"InputPassword",props:{value:{type:String,default(){return""}},placeholder:{type:String,default(){return""}},required:{type:Boolean,default(){return!1}},name:{type:String,default(){return"password"}},text:{type:String,default(){return"Digita a sua palavra passe"}},icon:{type:String,default(){return"bx bx-key bx-tada"}}},emits:["update"],setup(e){return(a,t)=>(u(),i(d,{type:"password",name:e.name,text:e.text,icon:e.icon,required:e.required,value:e.value,onUpdate:t[0]||(t[0]=r=>a.$emit("update",r))},null,8,["name","text","icon","required","value"]))}};export{x as _,k as a,d as b};
