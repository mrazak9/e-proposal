<div class="row">
    @php
        $indexSchedule = 0;
    @endphp
    <div class="col-md-12 mt-3">
        <div class="table-responsive table-sm">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th rowspan="2">Tahun ke-</th>
                        <th rowspan="2">Nama Kegiatan</th>
                        <th colspan="12">Bulan</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dedicationProposal->dedicationProposalsSchedule as $schedule)
                        <tr>
                            <td>{{ $schedule->year_at }}</td>
                            <td align="left">
                                   {{ ++$indexSchedule }}. {{ $schedule->event_name }}
                            </td>
                            <td>
                                {!! $schedule->{'1'} ? '<i class="fas fa-check text-success"></i>' : '' !!}
                            </td>
                            <td>
                                {!! $schedule->{'2'} ? '<i class="fas fa-check text-success"></i>' : '' !!}
                            </td>
                            <td>
                                {!! $schedule->{'3'} ? '<i class="fas fa-check text-success"></i>' : '' !!}
                            </td>
                            <td>
                                {!! $schedule->{'4'} ? '<i class="fas fa-check text-success"></i>' : '' !!}
                            </td>
                            <td>
                                {!! $schedule->{'5'} ? '<i class="fas fa-check text-success"></i>' : '' !!}
                            </td>
                            <td>
                                {!! $schedule->{'6'} ? '<i class="fas fa-check text-success"></i>' : '' !!}
                            </td>
                            <td>
                                {!! $schedule->{'7'} ? '<i class="fas fa-check text-success"></i>' : '' !!}
                            </td>
                            <td>
                                {!! $schedule->{'8'} ? '<i class="fas fa-check text-success"></i>' : '' !!}
                            </td>
                            <td>
                                {!! $schedule->{'9'} ? '<i class="fas fa-check text-success"></i>' : '' !!}
                            </td>
                            <td>
                                {!! $schedule->{'10'} ? '<i class="fas fa-check text-success"></i>' : '' !!}
                            </td>
                            <td>
                                {!! $schedule->{'11'} ? '<i class="fas fa-check text-success"></i>' : '' !!}
                            </td>
                            <td>
                                {!! $schedule->{'12'} ? '<i class="fas fa-check text-success"></i>' : '' !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
