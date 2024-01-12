       <div id="tag"></div>
       <!-- GEstion des tags -->
       <div class="p-4 border-2 border-blue-800 rounded-lg dark:border-blue-700 mt-3">
           <div class="flex justify-between mb-5">
               <h2 class="text-5xl mb-4">Gestion des Tags</h2>
               <!-- Open the modal using ID.showModal() method -->
               <button class="block text-white bg-blue-700 h-12 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="my_modal_1.showModal()">Ajouter Tag</button>
               <dialog id="my_modal_1" class="modal bg-slate-700 p-4 rounded-lg">
                   <div class="modal-box">
                       <h3 class="font-bold text-lg text-white">Hello!</h3>
                       <p class="py-4 text-white">Press ESC key or click the button below to close</p>
                       <div class="modal-action">
                           <form method="dialog">
                               <div class="grid gap-4 mb-4 grid-cols-2">
                                   <div class="col-span-2">
                                       <label for="tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag</label>
                                       <input type="text" name="tag" id="tag" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                   </div>
                               </div>
                               <div class="flex justify-between">
                                   <button class="btn text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Close</button>
                                   <button class="btn text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" name="ajouterTag">Ajouter</button>
                               </div>
                           </form>
                       </div>
                   </div>
               </dialog>
           </div>
           <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
               <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                   <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                       <tr>
                           <th scope="col" class="px-6 py-3">
                               Tags
                           </th>
                           <th scope="col" class="px-6 py-3">
                               <span class="sr-only">Edit</span>
                           </th>
                           <th scope="col" class="px-6 py-3">
                               <span class="sr-only">Delet</span>
                           </th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr class="bg-white border-b dark:bg-white dark:border-white hover:bg-whitedark:hover:bg-white">
                           <?php foreach ($tags->getTags() as $tag) { ?>
                               <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-blue-700" name="tags">
                                   <?= $tag['name']; ?>
                               </th>
                               <td class="px-6 py-4 flex flex-row justify-evenly">
                                   <form action="" method="post">
                                       <button class="font-medium text-orange-700 dark:text-orange-500 hover:underline" name="editTag">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                               <path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path>
                                               <path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path>
                                           </svg>
                                           Edit
                                       </button>
                                   </form>
                               </td>
                               <td>
                                   <form action="index.php?page=dashboard" method="post">
                                       <button class="font-medium text-red-700 dark:text-red-500 hover:underline" name="deleteTag">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                               <path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path>
                                               <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                           </svg>
                                           Delete
                                       </button>
                                   </form>
                               </td>
                       </tr>
                   <?php } ?>
                   </tbody>
               </table>
           </div>
       </div>