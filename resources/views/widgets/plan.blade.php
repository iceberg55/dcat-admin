<div {!! $attributes !!}>
    @if ($title)
        <h2 class="plan-header">
            {!! $title !!}
        </h2>
    @endif
    <div class="plan-body">
        @if($content)
            <div>
                {!! $content !!}
            </div>
        @endif
        @if(count($phases))
           <div class="mt-2">
               <table class="table table-striped table-bordered table-sm text-center">
                   <thead>
                       <tr>
                           <th>Phases</th>
                           @foreach($phases as $phase)
                               <th>{!! $phase->title !!}</th>
                           @endforeach
                       </tr>
                   </thead>
                   <tbody>
                   <tr>
                       <td>@lang('performance-plan.fields.initial_balance')</td>
                       @foreach($phases as $phase)
                           <td>
                               @if(! is_null($phase->account_size))
                                   {!! number_format($phase->account_size->balance) !!}$
                               @else
                                   -
                               @endif
                           </td>
                       @endforeach
                   </tr>
                   <tr>
                       <td>@lang('performance-plan.fields.leverage')</td>
                       @foreach($phases as $phase)
                           <td>
                               @if(! is_null($phase->account_size))
                                   {!! $phase->account_size->leverage !!}%
                               @else
                                   -
                               @endif
                           </td>
                       @endforeach
                   </tr>
                   <tr>
                       <td>@lang('performance-plan.fields.max_loss_perc')</td>
                       @foreach($phases as $phase)
                           <td>
                               {!! $phase->max_loss_perc !!}%
                           </td>
                       @endforeach
                   </tr>
                   <tr>
                       <td>@lang('performance-plan.fields.max_daily_loss_perc')</td>
                       @foreach($phases as $phase)
                           <td>
                               {!! $phase->max_daily_loss_perc !!}%
                           </td>
                       @endforeach
                   </tr>
                   <tr>
                       <td>@lang('performance-plan.fields.min_trading_days')</td>
                       @foreach($phases as $phase)
                           <td>
                               @if($phase->min_trading_days)
                                   {!! $phase->min_trading_days !!}
                               @else
                                   -
                               @endif
                           </td>
                       @endforeach
                   </tr>
                   <tr>
                       <td>@lang('performance-plan.fields.max_trading_days')</td>
                       @foreach($phases as $phase)
                           <td>
                               @if($phase->max_trading_days)
                                   {!! $phase->max_trading_days !!}
                               @else
                                   -
                               @endif
                           </td>
                       @endforeach
                   </tr>
                   <tr>
                       <td>@lang('performance-plan.fields.calc_days_by')</td>
                       @foreach($phases as $phase)
                           <td>
                               {!! $phase->calc_days_by->label() !!}
                           </td>
                       @endforeach
                   </tr>
                   <tr>
                       <td>@lang('performance-plan.fields.profit_perc')</td>
                       @foreach($phases as $phase)
                           <td>
                               {!! $phase->profit_perc !!}
                           </td>
                       @endforeach
                   </tr>
                   <tr>
                       <td>@lang('performance-plan.fields.sl_required')</td>
                       @foreach($phases as $phase)
                           <td>
                               {!! $phase->sl_required->label() !!}
                           </td>
                       @endforeach
                   </tr>
                   <tr>
                       <td>@lang('performance-plan.fields.ea_prohibited')</td>
                       @foreach($phases as $phase)
                           <td>
                               {!! $phase->ea_prohibited->label() !!}
                           </td>
                       @endforeach
                   </tr>
                   <tr>
                       <td>@lang('performance-plan.fields.max_lots')</td>
                       @foreach($phases as $phase)
                           <td>
                               @if($phase->max_lots)
                                   {!! $phase->max_lots !!}
                               @else
                                   -
                               @endif
                           </td>
                       @endforeach
                   </tr>
                   <tr>
                       <td>@lang('performance-plan.fields.max_positions')</td>
                       @foreach($phases as $phase)
                           <td>
                               @if($phase->max_positions)
                                   {!! $phase->max_positions !!}
                               @else
                                   -
                               @endif
                           </td>
                       @endforeach
                   </tr>
                   </tbody>
               </table>
           </div>
        @endif
    </div>
    <div class="plan-footer">
        <button class="btn btn-primary d-block w-100" data-bs-toggle="modal" data-bs-target="#planModal{!! $hash_id !!}">
            <i class="fas fa-shopping-basket"></i> But for {!! $price !!}$
        </button>
        <div class="modal fade" id="planModal{!! $hash_id !!}" tabindex="-1" aria-labelledby="planModal{!! $hash_id !!}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" method="POST" action="{!! admin_route('plan.buy', ['plan_id' => $id]) !!}">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="planModal{!! $hash_id !!}Label">Buy Plan {!! $title !!}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="voucher" class="col-form-label">Voucher Code</label>
                            <input type="text" class="form-control" name="voucher">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Don't have Voucher Code</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-shopping-basket mr-1"></i> But for {!! $price !!}$
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>