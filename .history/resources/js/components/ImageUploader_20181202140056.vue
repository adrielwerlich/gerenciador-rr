<template>
  <div
    class="uploader"
    @click="openFileInput"
    @dragenter="OnDragEnter"
    @dragleave="OnDragLeave"
    @dragover.prevent
    @drop="onDrop"
    :class="{ dragging: isDragging }"
  >
    <div v-show="!images.length">
      <i class="fa fa-upload"></i>
      <p>Arraste suas images aqui</p>
      <div>OU</div>
      <div class="file-input">
        <label for class="for">Clique para selecionar</label>
        <input type="file" id="file" @change="onInputChange" multiple>
      </div>
    </div>

    <div class="images-preview" v-show="images.length">
      <div
        class="img-wrapper"
        v-for="(image, index) in images"
        :key="index"
        @mouseover="showIconDelete(true, index)"
        @mouseleave="showIconDelete(false,index)"
        @click.prevent="deleteImg(index, $event)"
      >
        <!-- <div class="tooltip" style="display:block">
          <span class="tooltiptext">Clique para deletar</span>
        </div> -->
        <img :src="image" :alt="`Image Uploader ${index}`">
        <div class="footer">
          <div :id="`div-details-${index}`" class="details" style="display:block">
            <span class="name" v-text="files[index].name"></span>
            <span class="size" v-text="getFileSize(files[index].size)"></span>
          </div>
          <div :id="`anchor-delete-${index}`" class="remove" style="display:none">
            <a  class="anchor-delete" href="" >
              <i class="fa fa-user-minus icon-delete"></i>
              Remover
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      iconDeleteArray: [],
      filesSize: 0,
      isDragging: false,
      dragCount: 0,
      files: [],
      images: []
    };
  },

  methods: {
    showIconDelete(show, index, e) {
      // debugger
      console.log("e", e);
      console.log("e", `anchor-delete-${index}`);
      document.getElementById(`anchor-delete-${index}`).style.display = show
        ? "block"
        : "none";

      document.getElementById(`div-details-${index}`).style.display = show
        ? "none"
        : "block";  
    },
    deleteImg(index, e) {
      console.log("event", e);
      e.stopPropagation()
      e.preventDefault()
      // debugger
      this.files.splice(index,1)
      this.images.splice(index,1)
       this.$parent.imageFiles.splice(index,1);
       this.$parent.form.pictures.splice(index,1);
      console.log('images', this.images)
      console.log('files', this.files)
    },
    getFileSize(size) {
      const fSExt = ["Bytes", "KB", "MB", "GB"];
      let i = 0;

      while (size > 900) {
        size /= 1024;
        i++;
      }
      return `${Math.round(size * 100) / 100} ${fSExt[i]}`;
    },
    openFileInput(e) {
      document.getElementById("file").click();
    },
    onDrop(e) {
      e.preventDefault();
      e.stopPropagation();
      this.isDragging = false;

      const files = e.dataTransfer.files;

      Array.from(files).forEach(file => this.displayImage(file));
      this.initShowIconDeleteArray();
    },

    displayImage(file) {
      if (!file.type.match("image.*")) {
        console.log(`${file.name} is not an image`);
        return;
      }
      // debugger
      this.files.push(file);
      this.$parent.imageFiles.push(file)
      

      let reader = new FileReader();
      console.log("reader", reader);
      reader.onload = e => {
        let imgBase64 = e.target.result
        this.images.push(imgBase64);
        this.$parent.form.pictures.push(imgBase64)  
      }

      reader.readAsDataURL(file);

      // this.$emit('fileAdded', )
    },
    OnDragLeave(e) {
      // console.log(e)
      e.preventDefault();
      this.dragCount--;
      if (this.dragCount <= 0) this.isDragging = false;
    },
    OnDragEnter(e) {
      // console.log(e)
      e.preventDefault();
      this.dragCount++;
      this.isDragging = true;
    },
    onInputChange(e) {
      //  debugger
      // console.log(event);
      const files = e.target.files;

      Array.from(files).forEach(file => this.displayImage(file));
      this.initShowIconDeleteArray();
    },
    initShowIconDeleteArray() {
      for (let i = 0; i < this.files.size; i++) this.showIconDelete[i] = false;
    }
  }
};
</script>

<style lang="scss">
.anchor-delete {
  // position: absolute;
  background: #009688;
  color: white !important;
  width: 100%;
}

.icon-delete {
  font-size: 75px;
  margin: -65%;
  color: crimson;
  margin-left: 4%;
  position: absolute;
}

.uploader {
  width: 100%;
  background: #2196f3;
  color: #fff;
  padding: 40px 15px;
  text-align: center;
  border-radius: 10px;
  border: 3px dashed #fff;
  font-size: 20px;
  position: relative;
  cursor: pointer;

  &.dragging {
    background: #fff;
    color: #2196f3;
    border: 3px dashed #2196f3;

    .file-input label {
      background: #2196f3;
      color: #fff;
    }
  }

  i {
    font-size: 75px;
  }

  .file-input {
    width: 200px;
    margin: auto;
    height: 68px;
    position: relative;
  }

  label,
  input {
    background: #fff;
    color: #2196f3;
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
    padding: 10px;
    border-radius: 4px;
    margin-top: 7px;
    cursor: pointer;
  }
  input {
    opacity: 0;
    z-index: -2;
  }
}

.images-preview {
  display: flex;
  flex-wrap: wrap;
  margin-top: 20px;

  .img-wrapper {
    width: 160px;
    display: flex;
    flex-direction: column;
    margin: 10px;
    height: 150px;
    justify-content: space-between;
    background: #009688;
    box-shadow: 5px 5px 20px #3e3737;
    position: relative;

    img {
      max-height: 105px;
    }
  }

  .img-wrapper:hover {
  }

  .details {
    font-size: 12px;
    background: transparent;
    color: #fff;
    display: flex;
    flex-direction: column;
    align-items: self-start;
    padding: 3px 6px;
    .name {
      overflow: hidden;
      height: 18px;
    }
  }
}

.upload-control {
  position: absolute;
  width: 100%;
  background: #fff;
  top: 0;
  left: 0;
  border-top-left-radius: 7px;
  border-top-right-radius: 7px;
  padding: 10px;
  padding-bottom: 4px;
  text-align: right;

  button,
  label {
    background: #2196f3;
    border: 2px solid #03a9f4;
    border-radius: 3px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
  }
  label {
    padding: 2px 5px;
    margin-right: 10px;
  }
}

/* Tooltip container */
// .tooltip {
//     // position: relative;
//     // display: inline-block;
//     // border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
// }

/* Tooltip text */
.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  padding: 5px 0;
  border-radius: 6px;

  /* Position the tooltip text - see examples below! */
  position: absolute;
  z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
