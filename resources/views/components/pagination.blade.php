<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
            {!! trans('pagination.showing') !!} @{{ pagination.from }} {!! trans('pagination.to') !!}
            @{{ pagination.to }} {!! trans('pagination.of') !!} @{{ pagination.total }}
            {!! trans('pagination.entries') !!}
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers float-right" id="example2_paginate">
            <ul class="pagination">
                <li v-if="pagination.current_page > 1" class="paginate_button page-item previous" id="example2_previous">
                    <a href="#" @click.prevent="changePage(pagination.current_page - 1)" aria-controls="example2"
                        data-dt-idx="0" tabindex="0" class="page-link">
                        {!! trans('pagination.previous') !!}
                    </a>
                </li>
                <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']"
                    class="paginate_button page-item">
                    <a href="#" @click.prevent="changePage(page)" aria-controls="example2" data-dt-idx="1" tabindex="0"
                        class="page-link">
                        @{{ page }}
                    </a>
                </li>
                <li v-if="pagination.current_page < pagination.last_page" class="paginate_button page-item next"
                    id="example2_next">
                    <a href="#" @click.prevent="changePage(pagination.current_page + 1)" aria-controls="example2"
                        data-dt-idx="7" tabindex="0" class="page-link">
                        {!! trans('pagination.next') !!}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
