<div class="list-group list-group-flush list-group-hoverable mt-3"
    style="border-left: 5px solid #858585; background: #f1f1f1; @if ($margin) margin-left: 25px; @endif"
    x-show="subaccount == '{{ $account->code }}'" x-data="{ subsaccount: null }" id="{{ $_account->code }}">
    <div class="list-group-item">
        <div class="row align-items-center">
            <div class="col text-truncate">
                <a href="{{ route('obelaw.accounting.coa.show', [$_account]) }}"
                    class="text-reset d-block">{{ $_account->name }}</a>
                <div class="d-block text-muted text-truncate mt-n1">
                    {{ $_account->code }}
                </div>
            </div>
            <div class="col text-truncate">
                <div href="#" class="text-reset d-block">
                    <x-obelaw-amount :value="$_account->amount" />
                </div>
                <div class="d-block text-muted text-truncate mt-n1">
                    amount
                </div>
            </div>
            <div class="col-auto">
                <a href="#{{ $_account->code }}" class="list-group-item-actions" x-show="subsaccount != '{{ $_account->code }}'"
                    @click="subsaccount = '{{ $_account->code }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                        </path>
                    </svg>
                </a>

                <a href="#" class="list-group-item-actions" x-show="subsaccount == '{{ $_account->code }}'"
                    @click="subsaccount = null">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"></path>
                        <path
                            d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87">
                        </path>
                        <path d="M3 3l18 18"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div x-show="subsaccount == '{{ $_account->code }}'">
        @foreach ($_account->accounts as $_account)
            @include('obelaw-accounting::coa.account', ['margin' => true])
        @endforeach
    </div>
</div>
