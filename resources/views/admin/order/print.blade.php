<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <title>Invoice</title>
  <link rel="stylesheet" href="{{ asset('theme/invoma/assets/css/style.css') }}">
</head>

<body>
  <div class="tm_container">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style2" id="tm_download_section">
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_top_head tm_mb20">
            <div class="tm_invoice_left">
              <div class="tm_logo"><img src="{{ asset('theme/invoma/assets/img/logo.svg') }}" alt="Logo"></div>
            </div>
            <div class="tm_invoice_right">
              <div class="tm_grid_row tm_col_3">
                <div>
                  <b class="tm_primary_color">Email</b> <br>
                  {{ $order->user_email }}
                </div>
                <div>
                  <b class="tm_primary_color">Phone</b> <br>
                  {{ $order->user_phone }}
                </div>
                <div>
                  <b class="tm_primary_color">Address</b> <br>
                  {{ $order->user_address }}
                </div>
              </div>
            </div>
          </div>
          <div class="tm_invoice_info tm_mb10">
            <div class="tm_invoice_info_left">
              <p class="tm_mb2"><b>Invoice To:</b></p>
              <p>
                <b class="tm_f16 tm_primary_color">{{ $order->receiver_name }}</b> <br>
                {{ $order->receiver_address }} <br>
                {{ $order->receiver_email }} <br>
                {{ $order->receiver_phone	 }}
              </p>
            </div>
            <div class="tm_invoice_info_right">
              <div class="tm_ternary_color tm_f50 tm_text_uppercase tm_text_center tm_invoice_title tm_mb15 tm_mobile_hide">Invoice</div>
              <div class="tm_grid_row tm_col_3 tm_invoice_info_in tm_accent_bg">
                <div>
                  <span class="tm_white_color_60">Grand Total:</span> <br>
                  <b class="tm_f16 tm_white_color">${{ number_format($order->total_price, 2) }}</b>
                </div>
                <div>
                  <span class="tm_white_color_60">Invoice Date:</span> <br>
                  <b class="tm_f16 tm_white_color">{{ $order->created_at->format('d F Y') }}</b>
                </div>
                <div>
                  <span class="tm_white_color_60">Invoice No:</span> <br>
                  <b class="tm_f16 tm_white_color">#{{ $order->id }}</b>
                </div>
              </div>
            </div>
          </div>
          <div class="tm_table tm_style1">
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table>
                  <thead>
                    <tr>
                      <th class="tm_width_7 tm_semi_bold tm_accent_color">Sản phẩm</th>
                      <th class="tm_width_7 tm_semi_bold tm_accent_color">Mã sản phẩm</th>
                      <th class="tm_width_2 tm_semi_bold tm_accent_color">Giá</th>
                      <th class="tm_width_1 tm_semi_bold tm_accent_color">Số lượng</th>
                      <th class="tm_width_2 tm_semi_bold tm_accent_color tm_text_right">Tổng tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($order->items as $item)
                      <tr class="{{ $loop->even ? 'tm_gray_bg' : '' }}">
                        <td class="tm_width_7">
                          <p class="tm_m0 tm_f16 tm_primary_color">{{ $item->product_name }}</p>
                        </td><td class="tm_width_7">
                          {{ $item->product_sku }}
                        </td>
                        <td class="tm_width_2">${{ number_format($item->product_price_sale, 2) }}</td>
                        <td class="tm_width_1">{{ $item->quantity }}</td>
                        <td class="tm_width_2 tm_text_right">${{ number_format($item->product_price_sale * $item->quantity, 2) }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tm_invoice_footer tm_mb15 tm_m0_md">
              <div class="tm_left_footer">
                <div class="tm_card_note tm_ternary_bg tm_white_color"><b>Payment info: </b>Credit Card - 236***********928</div>
                <p class="tm_mb2"><b class="tm_primary_color">Important Note:</b></p>
                <p class="tm_m0">Delivery dates are not guaranteed and Seller has <br>no liability for damages that may be incurred <br>due to any delay.</p>
              </div>
              <div class="tm_right_footer">
                <table class="tm_mb15">
                  <tbody>
                    <tr>
                      <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Subtotal</td>
                      <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">${{ number_format($order->subtotal, 2) }}</td>
                    </tr>
                    <tr>
                      <td class="tm_width_3 tm_danger_color tm_border_none tm_pt0">Discount 10%</td>
                      <td class="tm_width_3 tm_danger_color tm_text_right tm_border_none tm_pt0">+${{ number_format($order->discount, 2) }}</td>
                    </tr>
                    <tr>
                      <td class="tm_width_3 tm_primary_color tm_border_none tm_pt0">Tax 5%</td>
                      <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_pt0">+${{ number_format($order->tax, 2) }}</td>
                    </tr>
                    <tr>
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color tm_accent_bg tm_radius_6_0_0_6">Grand Total</td>
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right tm_white_color tm_accent_bg tm_radius_0_6_6_0">${{ number_format($order->total_price, 2) }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tm_invoice_footer tm_type1">
              <div class="tm_left_footer"></div>
              <div class="tm_right_footer">
                <div class="tm_sign tm_text_center">
                  <img src="{{ asset('theme/invoma/assets/img/sign.svg')}}" alt="Sign">
                  <p class="tm_m0 tm_ternary_color">Quốc Triệu</p>
                  <p class="tm_m0 tm_f16 tm_primary_color">Accounts Manager</p>
                </div>
              </div>
            </div>
          </div>
          <div class="tm_note tm_font_style_normal tm_text_center">
            <hr class="tm_mb15">
            <p class="tm_mb2"><b class="tm_primary_color">Terms & Conditions:</b></p>
            <p class="tm_m0">All claims relating to quantity or shipping errors shall be waived by Buyer unless made in writing to <br>Seller within thirty (30) days after delivery of goods to the address stated.</p>
          </div><!-- .tm_note -->
        </div>
      </div>
      <div class="tm_invoice_btns tm_hide_print">
        <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
          </span>
          <span class="tm_btn_text">Print</span>
        </a>
        <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </span>
          <span class="tm_btn_text">Download</span>
        </button>
      </div>
    </div>
  </div>
  <script src="{{ asset('theme/invoma/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('theme/invoma/assets/js/jspdf.min.js') }}"></script>
  <script src="{{ asset('theme/invoma/assets/js/html2canvas.min.js') }}"></script>
  <script src="{{ asset('theme/invoma/assets/js/main.js') }}"></script>
</body>

</html>
