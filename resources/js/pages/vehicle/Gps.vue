<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">GPS Tracker</h1>
        </div>
      </div>
    </div>
  </div>
  <iframe
    id="sinotrack"
    ref="frame1"
    :src="'https://sinotrack.com/'"
    width="100%"
    height="500"
  >
  </iframe>
</template>
