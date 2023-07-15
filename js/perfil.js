(function()
{    
    var PropTypes, ref$, button, dd, input, div, dt, dl, i, li, h2, span, form, ul, CSSTransitionGroup, availableVolumes, MorphButtonToModal, DeviceInfoButtonModal, slice$ = [].slice;
    PropTypes = React.PropTypes;
    ref$ = React.DOM, button = ref$.button, dd = ref$.dd, div = ref$.div, dt = ref$.dt, dl = ref$.dl, i = ref$.i, li = ref$.li, span = ref$.span, ul = ref$.ul, input = ref$.input, h2 = ref$.h2
    , form = ref$.form;
    CSSTransitionGroup = React.addons.CSSTransitionGroup;
    availableVolumes = [
      {
        name: ""
      }, {
        name: ""
      }, {
        name: "",
        subdirs: [""]
      }, {
        name: ""
      }, {
        name: ""
      }, {
        name: ""
      }, {
        name: ""
      }, {
        name: "",
        subdirs: ["", "", "", ""]
      }, {
        name: ""
      }, {
        name: ""
      }, {
        name: ""
      }
    ];
    MorphButtonToModal = React.createClass({
      name: "MorphButtonToModal",
      propTypes: {
        buttonDom: PropTypes.node,
        titleDom: PropTypes.node
      },
      getInitialState: function getInitialState(){
        return {
          isOpen: false,
          mainTranslateCoord: {
            x: 0,
            y: 0
          }
        };
      },
      componentWillUnmount: function componentWillUnmount(){
        window.cancelAnimationFrame(this.mainTranslateAnim);
        window.removeEventListener("resize", this.boundResizeHandler, false);
        document.removeEventListener("click", this.clickOutClose, false);
      },
      mainTranslateDuration: 600,
      coordToTranslate: function coordToTranslate(arg$){
        var x, y;
        x = arg$.x, y = arg$.y;
        return "translate(" + x + "px, " + y + "px)";
      },
      quadInOut: function quadInOut(time, begin, end, duration){
        if ((time = time / (duration / 2)) < 1) {
          return (end - begin) / 2 * time * time + begin;
        } else {
          return (end - begin) * -1 / 2 * ((time -= 1) * (time - 2) - 1) + begin;
        }
      },
      mainTranslateBack: function mainTranslateBack(){
        var startTime, startX, startY, duration, translate, this$ = this;
        startTime = window.performance.now();
        startX = this.state.mainTranslateCoord.x;
        startY = this.state.mainTranslateCoord.y;
        duration = this.mainTranslateDuration;
        translate = function(t){
          var deltaTime, newCoord;
          deltaTime = window.performance.now() - startTime;
          newCoord = {
            x: this$.quadInOut(deltaTime, startX, 0, duration),
            y: this$.quadInOut(deltaTime, startY, 0, duration)
          };
          this$.setState({
            mainTranslateCoord: newCoord
          });
          if (deltaTime < duration) {
            return this$.mainTranslateAnim = window.requestAnimationFrame(translate);
          }
        };
        translate();
      },
      mainTranslateToCenter: function mainTranslateToCenter(){
        var morphMain, startTime, rect, startX, startY, duration, translate, this$ = this;
        morphMain = this.refs.morphMain;
        startTime = window.performance.now();
        rect = morphMain.getBoundingClientRect();
        startX = rect.left;
        startY = rect.top;
        duration = this.mainTranslateDuration;
        translate = function(t){
          var deltaTime, ref$, width, height, newCoord;
          deltaTime = window.performance.now() - startTime;
          ref$ = morphMain.getBoundingClientRect(), width = ref$.width, height = ref$.height;
          newCoord = {
            x: this$.quadInOut(deltaTime, 0, (window.innerWidth - width) * 0.5 - startX, duration),
            y: this$.quadInOut(deltaTime, 0, (window.innerHeight - height) * 0.5 - startY, duration)
          };
          this$.setState({
            mainTranslateCoord: newCoord
          });
          if (deltaTime < duration) {
            return this$.mainTranslateAnim = window.requestAnimationFrame(translate);
          }
        };
        translate();
      },
      resizeHandler: function resizeHandler(event){
        var ref$, top, left, width, height, newCoord;
        ref$ = this.refs.morphWrapper.getBoundingClientRect(), top = ref$.top, left = ref$.left;
        ref$ = this.refs.morphMain.getBoundingClientRect(), width = ref$.width, height = ref$.height;
        newCoord = {
          x: (window.innerWidth - width) * 0.5 - left,
          y: (window.innerHeight - height) * 0.5 - top
        };
        this.setState({
          mainTranslateCoord: newCoord
        });
      },
      toggleClickOutClose: function toggleClickOutClose(){
        var this$ = this;
        if (this.state.isOpen) {
          this.boundResizeHandler = this.resizeHandler.bind(this);
          this.clickOutClose = function(event){
            if (!event.target.closest(".morph-modal-container")) {
              return this$.closeModal();
            }
          };
          window.addEventListener("resize", this.boundResizeHandler, false);
          document.addEventListener("click", this.clickOutClose, false);
        } else {
          window.removeEventListener("resize", this.boundResizeHandler, false);
          document.removeEventListener("click", this.clickOutClose, false);
        }
      },
      openModal: function openModal(event){
        this.mainTranslateToCenter();
        this.setState({
          isOpen: true
        }, this.toggleClickOutClose);
      },
      closeModal: function closeModal(event){
        this.mainTranslateBack();
        this.setState({
          isOpen: false
        }, this.toggleClickOutClose);
      },
      renderButton: function renderButton(){
        return div({
          ref: "morphButtonContainer",
          className: "morph-button-container"
        }, button({
          ref: "morphButton",
          className: "morph-button",
          onClick: this.openModal
        }, this.props.buttonDom));
      },
      renderModal: function renderModal(){
        return div({
          ref: "morphModalContainer",
          className: "morph-modal-container"
        }, div({
          ref: "morphModalTitle",
          className: "morph-modal-title"
        }, this.props.titleDom, button({
          ref: "morphCloseButton",
          className: "btn-close",
          onClick: this.closeModal
        }, i({
          ref: "morphCloseButtonIcon",
          className: "fa fa-times"
        }), span({
          ref: "morphCloseButtonLabel",
          className: "sr-only"
        }, "Close"))), div({
          ref: "morphModalBody",
          className: "morph-modal-body"
        }, this.props.children));
      },
      render: function render(){
        var classNames, wrapperClassNames;
        classNames = ["morph-button-to-modal", this.state.isOpen ? "open" : "closed", this.props.className].join(" ").trim();
        wrapperClassNames = classNames.split(" ").map(function(s){
          return s + "-wrapper";
        }).join(" ");
        return div({
          ref: "morphWrapper",
          className: wrapperClassNames
        }, div({
          ref: "morphMain",
          key: "morphButtonToModal",
          className: classNames,
          style: {
            transform: this.coordToTranslate(this.state.mainTranslateCoord)
          }
        }, React.createElement(CSSTransitionGroup, {
          key: "morphButtonTrans",
          transitionName: "morph-button",
          transitionEnterTimeout: 700,
          transitionLeaveTimeout: 200
        }, this.state.isOpen
          ? null
          : this.renderButton()), React.createElement(CSSTransitionGroup, {
          key: "morphModalTrans",
          transitionName: "morph-modal",
          transitionEnterTimeout: 1200,
          transitionLeaveTimeout: 200
        }, this.state.isOpen ? this.renderModal() : null)));
      }
    });
    DeviceInfoButtonModal = React.createClass({
      name: "DeviceInfoButtonModal",
      propTypes: 
      {
        volumes: PropTypes.arrayOf(PropTypes.shape(
        {
          name: PropTypes.string.isRequired,
          subdirs: PropTypes.arrayOf(PropTypes.string)
        }))
      },
      renderVolume: function renderVolume(colIdx, vol, idx)
      {
        var this$ = this;
        idx == null && (idx = 0);
        return div(
        {
          className: "device-volume"
        }, div({ className: "info-key-picture" }),
        [div(
        {
          key: "2"
        })].concat(!vol.subdirs || !vol.subdirs.length ? [] : vol.subdirs.map));
      },
      renderVolumes: function renderVolumes(volumes, count)
      {
        return div(
          {
          className: "edit-perfil-config",
          style: 
          {
            flexBasis: "100%",
            maxWidth: "100%"
          }
        },
        [div(
        {
          key: "edit-perfil-config",
          className: "edit-perfil-config",
          style: 
          {
            flexBasis: "100%",
            maxWidth: "100%"
          }
        })]);
      },
      renderVolumes2: function renderVolumes2(volumes2, count){
        var volCount2;
        volCount2 = this.props.volumes.reduce(function(acc, vol){
          return acc + 1 + (vol.subdirs ? vol.subdirs.length : 0);
        }, 0);
        return div({
          className: "teste-teste",
          style: volCount2 < 7 ? {flexBasis: "50%", maxWidth: "50%", flex: "0 0 100%"} : {}
        }, 
        [div({
          key: "teste-teste",
          className: "teste-teste",
          style: 
          {
            flexBasis: "100%",
            maxWidth: "100%",
            paddingLeft: "9rem"
          }
        })]);
      },
      renderDeviceDetailsInfo: function renderDeviceDetailsInfo(){
        var volCount;
        volCount = this.props.volumes.reduce(function(acc, vol){
          return acc + 1 + (vol.subdirs ? vol.subdirs.length : 0);
        }, 0);
        return div(
        {
          className: "device-details-info"
        }, 
        [div(
        {
          key: "os-conn-0",
          className: "edit-pass-config",
          style: volCount < 7 ? {flexBasis: "50%", maxWidth: "50%", paddingRight: "9rem"} : {}
        },
        form(
        {
          className: "formEditPass",
          id: "idFormEditPass",
          action: "editPass.php?" + sessionEmail,
          method: "POST"
        },
        h2(
        {
          className: "editarSenha"
        }, "Editar senha"),
        input(
        {
          className: "inputPerfil",
          id: "txtPass",
          name: "passEdit",
          placeholder: "Senha",
          type: "password",
          minLength: 6,
          required: "required"
        }),
        input(
        {
          className: "inputEmail",
          name: "inputEmail",
          placeholder: "Email",
          type: "hidden",
          value: sessionEmail
        }), 
        i(
        {
          className: "fa-solid fa-eye eyeIcon",
          id: "iconEye"
        }),
        input(
        {
          className: "inputPerfil",
          id: "txtPassConfirm",
          name: "passEditConfirm",
          placeholder: "Confirmar Senha",
          type: "password",
          minLength: 6,
          required: "required"
        }), 
        button(
        {
          id: "btn"
        }, "Salvar")))].concat(), this.renderVolumes(availableVolumes, volCount), this.renderVolumes2(availableVolumes, volCount));
      },
      render: function render(){
        return React.createElement(MorphButtonToModal, {
          key: "deviceEntryInfoModal",
          className: "device-entry-info-modal",
          buttonDom: this.renderButtonDom,
          titleDom: this.renderTitleDom
        }, 
        div({
          key: "deviceDetailsInfoContainer",
          className: "device-details-info-container"
        }, 
        div({
          className: "device-details-info-header"
        }, 
        div({
          className: "divDevice"
        }, i({className: icons})),
        div({
          className: "device-label"
        }, 
        span({
          className: "device-name"
        }, sessionName), 
        span({
          className: "device-online-status"
        }, "Online"))), this.renderDeviceDetailsInfo()));
      }
    });
    ReactDOM.render(React.createElement(DeviceInfoButtonModal, {
      volumes: availableVolumes
    }), document.getElementById("app"));
    function deepEq$(x, y, type){
      var toString = {}.toString, hasOwnProperty = {}.hasOwnProperty,
          has = function (obj, key) { return hasOwnProperty.call(obj, key); };
      var first = true;
      return eq(x, y, []);
      function eq(a, b, stack) {
        var className, length, size, result, alength, blength, r, key, ref, sizeB;
        if (a == null || b == null) { return a === b; }
        if (a.__placeholder__ || b.__placeholder__) { return true; }
        if (a === b) { return a !== 0 || 1 / a == 1 / b; }
        className = toString.call(a);
        if (toString.call(b) != className) { return false; }
        switch (className) {
          case '[object String]': return a == String(b);
          case '[object Number]':
            return a != +a ? b != +b : (a == 0 ? 1 / a == 1 / b : a == +b);
          case '[object Date]':
          case '[object Boolean]':
            return +a == +b;
          case '[object RegExp]':
            return a.source == b.source &&
                   a.global == b.global &&
                   a.multiline == b.multiline &&
                   a.ignoreCase == b.ignoreCase;
        }
        if (typeof a != 'object' || typeof b != 'object') { return false; }
        length = stack.length;
        while (length--) { if (stack[length] == a) { return true; } }
        stack.push(a);
        size = 0;
        result = true;
        if (className == '[object Array]') {
          alength = a.length;
          blength = b.length;
          if (first) {
            switch (type) {
            case '===': result = alength === blength; break;
            case '<==': result = alength <= blength; break;
            case '<<=': result = alength < blength; break;
            }
            size = alength;
            first = false;
          } else {
            result = alength === blength;
            size = alength;
          }
          if (result) {
            while (size--) {
              if (!(result = size in a == size in b && eq(a[size], b[size], stack))){ break; }
            }
          }
        } else {
          if ('constructor' in a != 'constructor' in b || a.constructor != b.constructor) {
            return false;
          }
          for (key in a) {
            if (has(a, key)) {
              size++;
              if (!(result = has(b, key) && eq(a[key], b[key], stack))) { break; }
            }
          }
          if (result) {
            sizeB = 0;
            for (key in b) {
              if (has(b, key)) { ++sizeB; }
            }
            if (first) {
              if (type === '<<=') {
                result = size < sizeB;
              } else if (type === '<==') {
                result = size <= sizeB
              } else {
                result = size === sizeB;
              }
            } else {
              first = false;
              result = size === sizeB;
            }
          }
        }
        stack.pop();
        return result;
      }
    }    
}).call(this);