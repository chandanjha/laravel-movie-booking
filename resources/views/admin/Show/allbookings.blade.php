<x-layout>
    <x-admin_header />
    <x-nav />

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    @if( count($bookings) > 0 )
                    <section class="panel">
                        <table class="table table-striped table-advance table-hover">
                        <tbody>
                            <tr>
                                
                            </tr>
                        </tbody>
                        </table>
                    </section>
                    @else
                    <h1>No Bookings Found</h1>
                    @endif
                </div>
            </div>

        </section>
    </section>

</x-layout>