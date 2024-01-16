<div >
<h1>&#128161;candidats</h1>

<div class="progresse" style="hieght: 30px">
<div class="progress" role="progressbar" aria-label="Warning striped example" aria-valuenow="{{$brigthness}}" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"  style="width: {{$brigthness}}"aria-valuenow="{{$brigthness}}" aria-valuemin="0" aria-valuemax="100">{{$brigthness}}</div>
</div>

<div class="center">
    <button class="btn btn-danger mt-3" wire:click="off">off</button>
    <button class="btn btn-success mt-3" >-</button>
    <button class="btn btn-primary mt-3" >+</button>
    <button class="btn btn-secondary mt-3" wire:click="ON">On</button>


</div>

</div>
