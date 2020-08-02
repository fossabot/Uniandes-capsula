<mjml>
  <mj-head>
    <mj-attributes>
      <mj-all padding="0px"></mj-all>
      <mj-class name="preheader" color="#cccccc" font-size="11px" font-family="Ubuntu, Helvetica, Arial, sans-serif" padding="0 20px"></mj-class>
      <mj-class name="cta" color="#FFFFFF" font-size="13px" border-radius="3px" href="https://mjml.io" font-family="Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif" padding="20px 25px"></mj-class>
      <mj-class name="footer-text" align="center" color="#ffffff" font-family="Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif" font-size="15px" padding="0 25px"></mj-class>
      <mj-navbar-link padding="0 35px" font-weight="bold" font-size="12px"></mj-navbar-link>
    </mj-attributes>
    <mj-style inline="inline">a { text-decoration: none; color: inherit; }</mj-style>
  </mj-head>
  <mj-body background-color="#000000">
    <mj-section padding-bottom="20px" padding-top="20px">
      <mj-group>
        <mj-column>
          <mj-text mj-class="preheader"><a href="https://mjml.io">[[HEADLINE]]</a></mj-text>
        </mj-column>
        <mj-column>
          <mj-text mj-class="preheader" align="right"><a href="https://mjml.io">[[PERMALINK_LABEL]]</a></mj-text>
        </mj-column>
      </mj-group>
    </mj-section>
    <mj-section background-color="#000000">
      <mj-column>
        <mj-image src="{{ asset('img') }}/logoUniandes.svg" alt="Logo Uniandes" align="center" width="105px" padding="10px 0"></mj-image>
      </mj-column>
    </mj-section>
    <mj-section background-url="http://191n.mj.am/img/191n/3s/xm9.jpg" background-repeat="no-repeat" background-size="cover" padding="20px 0">
      <mj-column>
        <mj-text align="center" color="#ffffff" line-height="32px" font-family="Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif" font-size="28px" padding="10px">ARE YOU <br /> SEASCAPE?</mj-text>
      </mj-column>
      <mj-column width="50%" vertical-align="bottom">
        <mj-text align="center" color="#ffffff" line-height="32px" font-family="Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif" font-size="28px" padding-top="180px">OR <br /> CITYSCAPE?</mj-text>
      </mj-column>
    </mj-section>
    <mj-section background-color="#000000" padding="20px 0">
      <mj-column>
        <mj-image src="{{asset('storage/' . $image)}}" alt="Maldives, Corse : -15%" width="240px"></mj-image>
        <mj-button mj-class="cta" background-color="#bd8714">Verlo en el explorador</mj-button>
      </mj-column>
      <mj-column>
        <mj-text align="center" color="#ffee00" font-family="Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif" font-size="13px" padding="0 25px" font-weight="bold">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod vel sapien non ultricies. Duis id est et metus cursus volutpat eget a leo. Donec id interdum eros. Suspendisse lobortis nibh at purus aliquam vestibulum. Mauris lacus dui, volutpat ut aliquam sit amet, facilisis eget tellus. Morbi eleifend libero nibh, vel dapibus nunc varius vel. Aenean molestie est sed odio posuere congue. Mauris interdum luctus elit, sed interdum nisl maximus a. Etiam efficitur elit velit, vel eleifend risus suscipit in. Nullam malesuada dapibus risus et viverra.</p>
        </mj-text>
      </mj-column>
    </mj-section>
    <mj-section background-color="#4395b1">
      <mj-column width="33.33333333333333%">
        <mj-image src="http://191n.mj.am/img/191n/3s/x1l.png" alt="Call us : 0 800 123 456" width="97px" padding="10px 25px"></mj-image>
      </mj-column>
      <mj-column width="33.33333333333333%">
        <mj-image href="https://mjml.io" src="http://191n.mj.am/img/191n/3s/x1m.png" alt="Meet us : find an agency" width="117px" padding="10px 25px"></mj-image>
      </mj-column>
      <mj-column width="33.33333333333333%">
        <mj-image href="https://mjml.io" src="http://191n.mj.am/img/191n/3s/xs0.png" alt="ASK US : find an expert" width="110px" padding="10px 25px"></mj-image>
      </mj-column>
    </mj-section>
    <mj-section padding="20px 0">
      <mj-column>
        <mj-text align="center" color="#000000" font-size="11px">[[DELIVERY_INFO]]
          <p>[[POSTAL_ADDRESS]]</p>
        </mj-text>
      </mj-column>
    </mj-section>
  </mj-body>
</mjml>
