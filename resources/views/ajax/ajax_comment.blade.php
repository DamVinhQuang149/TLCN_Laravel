@if ($comments)
    @foreach ($comments as $comm)
        @if ($comm->isApproved == 1)
            <div class="media">
                <a class="pull-left" href="#">
                    <img width="50" class="media-object" src="{{ asset('assets/img/' . $comm->user->image) }} "
                        alt="Image">
                </a>

                <div class="media-body">
                    <h4 class="media-heading">{{ $comm->user->First_name }} {{ $comm->user->Last_name }}
                        <small>{{ $comm->created_at->format('d/m/Y') }}</small>
                        <ul class="ratingW-comment">
                            <small>
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $comm->star) {
                                        echo '<li class="on"><div class="star-comm"></div></li>';
                                    } else {
                                        echo '<li><div class="star-comm"></div></li>';
                                    }
                                }
                                ?>
                            </small>
                        </ul>
                    </h4>
                    <p>{{ $comm->comment }}</p>
                    @can('my-comment', $comm)
                        <!-- <form action="" method="get" class="text-right">
                                <a href="" class="btn btn-primary btn-sm">Sửa</a>
                            </form> -->
                        <form class="text-right">
                            <button type="button" id="applyCouponButton"
                                style="background-color: #f80808; color: #fff; border: none; border-radius: 4px; padding: 9px; cursor: pointer;"
                                onclick="deleteComment({{ $comm->comm_id }})">
                                <strong>
                                    Xóa
                                </strong>
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        @endif
    @endforeach
@else
    <div class="alert alert-danger" id="shipping_policy">Bạn chưa đặt sản phẩm này. Vui lòng đặt hàng trước khi đánh giá
        sản phẩm!</div>
@endif
