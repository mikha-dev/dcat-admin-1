<style>
.inter-button{
    padding: 25px;
    flex-basis: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.inter-button:not(:last-child){
    border-right: 1px solid #383838;
}

.inter-button .icon{
    margin-right: 12px;
}

.inter-button .text{
    color: #FFF;
    font-size: 22px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
}
</style>
<div class='inter-button'>
    @if($icon) <span class='icon'>{!! $icon !!}</span> @endif
    <span class='text'><a href="{{ $href }}">{{ $text }}</a></span>
</div>