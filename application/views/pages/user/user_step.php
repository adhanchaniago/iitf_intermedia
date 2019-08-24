<style type="text/css">
  :root {
    --background-color: #ffffff;
    --primary-color: #e66a53;
  }

  * {
    box-sizing: border-box;
  }

  body {
    /* margin: 0;
    height: 100%;
    width: 100vw; */
    /* background-color: rgba(0, 0, 0, 0.08);
    font-family: Arial; */
    /* display: flex; */
  }

  .steps {
    /* width: auto; */
    /* box-shadow: 0px 10px 15px -5px rgba(0, 0, 0, 0.3); */
    background-color: #fff;
    padding: 24px 0;
    position: relative;
    margin: auto;
  }

  .steps::before {
    content: "";
    position: absolute;
    top: 0;
    height: 24px;
    width: 1px;
    background-color: rgba(0, 0, 0, 0.2);
    left: calc(50px / 2);
    z-index: 1;
  }

  .steps::after {
    content: "";
    position: absolute;
    height: 13px;
    width: 13px;
    background-color: var(--primary-color);
    /* box-shadow: 0px 0px 5px 0px var(--primary-color); */
    border-radius: 15px;
    left: calc(50px / 2);
    bottom: 24px;
    transform: translateX(-45%);
    z-index: 2;
  }

  .step {
    padding: 0 20px 24px 50px;
    position: relative;
    transition: all 0.4s ease-in-out;
    background-color: #fff;
  }

  .step::before {
    content: "";
    position: absolute;
    height: 13px;
    width: 13px;
    background-color: rgb(198, 198, 198);
    border-radius: 15px;
    left: calc(50px / 2);
    transform: translateX(-45%);
    z-index: 2;
  }

  .step::after {
    content: "";
    position: absolute;
    height: 100%;
    width: 1px;
    background-color: rgb(198, 198, 198);
    left: calc(50px / 2);
    top: 0;
    z-index: 1;
  }

  .step.minimized {
    background-color: #fff;
    transition: background-color 0.3s ease-in-out;
    cursor: pointer;
  }

  .header {
    user-select: none;
    font-size: 16px;
    color: rgba(0, 0, 0, 0.6);
  }

  .subheader {
    user-select: none;
    font-size: 14px;
    color: rgba(0, 0, 0, 0.4);
  }

  .step-content {
    transition: all 0.3s ease-in-out;
    overflow: hidden;
    position: relative;
  }

  .step.minimized > .step-content {
    height: 0px;
  }

  .step-content.one {
    height: 460px;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.05);
    border-radius: 4px;
    margin-top: 10px;
  }

  .step-content.two {
    height: 600px;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.05);
    border-radius: 4px;
    margin-top: 10px;
  }

  .step-content.three {
    height: 400px;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.05);
    border-radius: 4px;
    margin-top: 10px;
  }

  .next-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    border: 0;
    padding: 10px 20px;
    border-radius: 4px;
    background-color: red;
    box-shadow: 0 5px 10px -3px rgba(0, 0, 0, 0.3);
    color: #fff;
    transition: background-color 0.3s ease-in-out;
    cursor: pointer;
    transform: translate(-50%, -50%);
  }

  .close-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    border: 0;
    padding: 10px 20px;
    border-radius: 4px;
    background-color: rgb(255, 0, 255);
    box-shadow: 0 5px 10px -3px rgba(0, 0, 0, 0.3);
    color: #fff;
    transition: background-color 0.3s ease-in-out;
    cursor: pointer;
    transform: translate(-50%, -50%);
  }

  /* Irrelevant styling things */
  .close-btn:hover {
    background-color: rgba(255, 0, 255, 0.6);
  }

  .close-btn:focus {
    outline: 0;
  }

  .next-btn:hover {
    background-color: rgba(255, 0, 0, 0.6);
  }

  .next-btn:focus {
    outline: 0;
  }

  .step.minimized:hover {
    background-color: rgba(0, 0, 0, 0.06);
  }
</style>

<?php $this->load->view('component/nav')?>
<div class="container">
  <div class="columns">
    <div class="column is-4">
      <div class="steps column">
        <div class="step column">
          <div class="step-header">
            <div class="header">Pilih kategori Lomba !</div>
            <div class="subheader">Kamu mau lomba apa ?</div>
          </div>
        </div>
        <div class="step minimized">
          <div class="step-header">
            <div class="header">This is step two!</div>
            <div class="subheader">The content is a little bigger!</div>
          </div>
        </div>
        <div class="step minimized">
          <div class="step-header">
            <div class="header">And finally step three!</div>
            <div class="subheader">Last but not the least!</div>
          </div>
        </div>
      </div>
    </div>

    <div class="column is-8">
      <div class="field">
        <div class="control">
          <input
            class="input is-primary"
            type="text"
            placeholder="Primary input"
          />
        </div>
      </div>
      <div class="field">
        <div class="control">
          <input class="input is-info" type="text" placeholder="Info input" />
        </div>
      </div>
      <div class="field">
        <div class="control">
          <input
            class="input is-success"
            type="text"
            placeholder="Success input"
          />
        </div>
      </div>
      <div class="field">
        <div class="control">
          <input
            class="input is-warning"
            type="text"
            placeholder="Warning input"
          />
        </div>
      </div>
      <div class="field">
        <div class="control">
          <input
            class="input is-danger"
            type="text"
            placeholder="Danger input"
          />
        </div>
      </div>
      <div class="field is-grouped">
        <div class="control">
          <button class="button is-link">Submit</button>
        </div>
        <div class="control">
          <button class="button is-text">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>
