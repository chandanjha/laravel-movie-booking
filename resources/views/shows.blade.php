<x-layout>
    <x-header />
    <?php $date = date('Y-m-d') ?>
        <div style="float: right; width:10%; ">
            <a href="{{ URL::previous() }}" style="background-color:black; color:white;" class="btn">Back</a>
        </div>
    <div class="frontend">
        
        <div class="row">
            
            <div class="col-lg-12">
                

                @if(count($shows) > 0)
                <section class="panel">
                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                            <tr>
                                <td>S.no</td>
                                <td>Theater</td>
                                <td>Screen Name</td>
                                <td>Movie</td>
                                <td>Date</td>
                                <td>Slot</td>
                                <td>Seats Available</td>
                                <td><i class="icon_cogs"></i>Action</td>
                            </tr>
                            <?php $i = 0 ?>


                            @foreach($shows as $show)
                            
                            @if($show->show_date >= $date)
                            <tr>
                                
                                <td>{{ $i=$i+1 }}</td>
                                <td>{{ ucwords($show->theater->name) }}</td>
                                <td>Screen {{ $show->screen_id }}</td>
                                <td>{{ ucwords($show->movie->name) }}</td>
                                <td>{{ $show->show_date}}</td>
                                <td>
                                    @if($show->slot == "slot-1")
                                    <?= "Morning 9-12" ?>
                                    @elseif($show->slot == "slot-2")
                                    <?= "Day 12-3" ?>
                                    @elseif($show->slot == "slot-3")
                                    <?= "Evening 3-6" ?>
                                    @elseif($show->slot == "slot-4")
                                    <?= "Evening 6-9" ?>

                                    @else
                                    <?= "not defined" ?>
                                    @endif
                                </td>

                                <td>{{ $show->seats_available }}</td>

                                <td>
                                   <a class="btn btn-primary btm-md" href="/book/{{ $show->id }}">Book</a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </section>
                @else
                <h1>No Shows Found</h1>
                @endif

            </div>
        </div>
    </div>
</x-layout>