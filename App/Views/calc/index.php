<h1>Calculyator</h1>

<style>
     #display {
          width: 95%;
          height: 3rem;
          font-size: 2.5rem;
     }

     button {
          width: 23%;
          height: 4rem;
          margin: 0.08rem;
          font-size: 2rem !important;
     }
    

     .calc-wrap {
          min-width: 300px;
     }
</style>



<div class="row">
     <div class="calc-wrap m-auto bg-secondary p-2 rounded">
          <div class="cal text-center">
               <div class="display mt-1 shadow p-3 mb-2 bg-body rounded">
                    <input type="text" id="display" class="text-right">
               </div>
               <div class="calc-bth d-flex flex-wrap justify-content-center" id="calc-btn">
                    <button class="btn btn-info" value="7">7</button>
                    <button class="btn btn-info" value="8">8</button>
                    <button class="btn btn-info" value="9">9</button>
                    <button class="btn btn-warning" value="/">&divide;</button>
                    <button class="btn btn-info" value="4">4</button>
                    <button class="btn btn-info" value="5">5</button>
                    <button class="btn btn-info" value="6">6</button>
                    <button class="btn btn-warning" value="*">&times;</button>
                    <button class="btn btn-info" value="1">1</button>
                    <button class="btn btn-info" value="2">2</button>
                    <button class="btn btn-info" value="3">3</button>
                    <button class="btn btn-warning" value="+">+</button>
                    <button class="btn btn-danger" value="C">C</button>
                    <button class="btn btn-info" value="0">0</button>
                    <button class="btn btn-primary" value="=">=</button>
                    <button class="btn btn-warning" value="-">-</button>

               </div>
          </div>
     </div>

</div>