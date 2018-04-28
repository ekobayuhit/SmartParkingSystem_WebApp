<footer>
  <div class="blockquote-footer">
    <div class="inner">
      <div class="row text-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <span class="copyright">
            <strong>Copyright &copy;
              <a href="http://soedirmanmoeda.herokuapp.com/">Soedirman Moeda Project </a>
              @if(date('Y')=="2018")
                {{ date('Y') }}
              @else
                {{ "2018-" . date('Y') }}
              @endif
            </strong>
          </span>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Use</a>
        </div>
      </div>
    </div>
  </div>
</footer>
