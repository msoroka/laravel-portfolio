<div class="skills row" id="skills">
    <div class="separator"><h3>Skills</h3></div>
    @foreach($skills as $skill)
        <div class="skill col-lg-3 col-md-6 col-sm-12" style="background: {{ $skill->color }} !important;">
            <img src="{{ asset('images/' . $skill->image) }}"
                 alt="{{ $skill->name }}">
            <div class="skill-desc">
                <h3><strong>{{ $skill->name }}</strong></h3>
{{--                <p>{{ $skill->description }}</p>--}}
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex laudantium qui quos. Dolores esse modi, odit quisquam quo saepe velit?</p>
            </div>
        </div>
    @endforeach
</div>
